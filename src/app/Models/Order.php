<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Exchanges\OneC\Interfaces\OrderInterface;

class Order extends Model implements OrderInterface
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'payment',
        'is_paid',
        'delivery',
        'total',
        'inn',
        'name',
        'phone',
        'email',
        'city',
        'address',
        'comment',
        'notes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function history(): HasMany
    {
        return $this->hasMany(OrderHistory::class)->orderByDesc('created_at');
    }

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function totals(): HasMany
    {
        return $this->hasMany(OrderTotal::class);
    }

    public function coupon(): HasMany
    {
        return $this->hasMany(CouponHistory::class);
    }


    /* 1c */
    /**
     * Список заказов с сайта.
     *
     * @return OrderInterface[]
     */
    public static function findOrders1c()
    {
        $result = array();

        $orders = static::where('exchange_1c', null)
                ->orWhere(function ($query) {
                    $query->where('exchange_1c', '!=', true)
                        ->where('exchange_1c', '!=', null)
                        ->where('exchange_1c', '<=', strtotime('-30 minutes'));
                })
                ->get();

        foreach ($orders as $order) {
            $order_products = array(); 

            foreach ($order->products as $product) {
                $order_products[] = array(
                    'Ид' => $product->product->exchange_1c,
                    'Наименование' => $product->product->title,
                    'БазоваяЕдиница' => [
                        '_attributes' => [
                            'Код' => '796',
                            'НаименованиеПолное' => 'Штука',
                            'МеждународноеСокращение' => 'PCE',
                        ],
                        '_value' => 'шт'
                    ],
                    'ЦенаЗаЕдиницу' => $product->price,
                    'Количество' => $product->quantity,
                    'Сумма' => $product->total,
                    'ЗначенияРеквизитов' => [
                        'ЗначениеРеквизита' => [
                            ['Наименование' => 'ВидНоменклатуры', 'Значение' => 'Товар'],
                            ['Наименование' => 'ТипНоменклатуры', 'Значение' => 'Товар'],
                        ],
                    ],
                    'СтавкиНалогов' => [
                        'СтавкаНалога' => [
                            ['Наименование' => 'НДС', 'Значение' => '20'],
                        ],
                    ],
                    'Налоги' => [
                        'Налог' => [
                            'Наименование' => 'НДС',
                            'УчтеноВСумме' => true,
                            'Сумма' => $product->total * (20 / 100),
                        ]
                    ]
                );
            }


            $props = array();

            $props[] = [
                'Наименование' => 'Статус заказа',
                'Значение' => $order->status
            ];

            $props[] = [
                'Наименование' => 'Адрес доставки',
                'Значение' => collect([
                    $order->city,
                    $order->address
                ])->filter()->implode(', ')
            ];

            $props[] = [
                'Наименование' => 'Статуса заказа ИД',
                'Значение' => $order->status
            ];

            if ($order->inn) {
                $props[] = [
                    'Наименование' => 'ИНН',
                    'Значение' => $order->inn
                ];
            }
       
            $result[] = array(
                'Ид' => $order->id,
                'Номер' => $order->id,
                'Дата' => $order->created_at->format('Y-m-d'),
                'Время' => $order->created_at->format('H:i:s'),
                'ХозОперация' => 'Заказ товара',
                'Роль' => 'Продавец',
                'Валюта' => 'руб',
                'Курс' => 1,
                'Сумма' => $order->total,
                'НомерВерсии' => 0,
                'Комментарий' => $order->comment,
               
                'Контрагенты' => [
                    'Контрагент' => [
                        'Ид' => collect([
                            $order->user_id,
                            $order->email,
                            $order->name
                        ])->filter()->implode('#'),
                        'Роль' => 'Покупатель',
                        'ИНН' => $order->inn,
                        'Наименование' => $order->name,
                        'ПолноеНаименование' => $order->name,
                        'Адрес' => [
                            'Представление' => collect([
                                $order->city,
                                $order->address
                            ])->filter()->implode(', '),
                        ],
                        'Контакты' => [
                            'Контакт' => [
                                ['Тип' => 'ТелефонРабочий', 'Значение' => $order->phone],
                                ['Тип' => 'Почта', 'Значение' => $order->email],
                            ],
                        ],
                        'Представители' => [
                            'Представитель' => [
                                'Контрагент' => [
                                    'Отношение' => 'Контактное лицо',
                                    'Ид' => '',
                                    'Наименование' => $order->name
                                ]
                            ]
                        ]
                    ]
                    
                ],
                'Налоги' => [
                    'Налог' => [
                        'Наименование' => 'НДС',
                        'УчтеноВСумме' => true,
                        'Сумма' => $order->total * (20 / 100),
                    ]
                ],
                'Товары' => [
                    'Товар' => $order_products
                ],
                'ЗначенияРеквизитов' => [
                    'ЗначениеРеквизита' => $props,
                ],

            );           
      
            $order->exchange_1c = strtotime('now');
            $order->save();
        }

        return $result;
    }

    /**
     * Список предложений в этом заказе.
     *
     * @return OfferInterface[]
     */
    public function getOffers1c()
    {
        return $this->products;
    }

    /**
     * Получить список реквизитов в заказе.
     *
     * @return mixed
     */
    public function getRequisites1c()
    {
        return null; // У нас нет реквизитов
    }

    /**
     * Получаем контрагента у документа.
     *
     * @return PartnerInterface
     */
    public function getPartner1c()
    {
        return $this->user;
    }

    /**
     * @param string $id
     * @param string $source_id
     * @return OrderInterface|null
     */
    public static function findOrderBy1c(string $id, string $source_id): ?self
    {
        return self::find($id);
    }

     /**
     * @param Order $order
     * @param string $source_id
     *
     * @return self
     */
    public function createModel1c($order, $source_id)
    {
        foreach ($order->ЗначенияРеквизитов->ЗначениеРеквизита as $requisite) {
            if ($requisite->Наименование == 'Статус заказа') {
                $status_update = false;

                foreach (config('settings.exchange_1c_statuses') as $status_project => $status_1c) {
                    $status_1c = explode(',', $status_1c);

                    if (in_array($requisite->Значение, $status_1c)) {
                        $this->status = $status_project;

                        $status_update = true;

                        break;
                    }
                }
         
                if (!$status_update) {
                    info(__('Couldn\'t find the order status ":status" when integrating with 1C', ['status' => $requisite->Значение]));
                }
            }
        }
 
        //$this->address = fake()->address();

        $this->exchange_1c = true;
      
        $this->save();
    }
}
 
