<div>
    <section class="section section--categorypage">
        <div class="container">

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split(Filter::class, [
                'slug' => $slug, 
                'build' => 'compilation' . ucfirst($slug)
                ]);

$__html = app('livewire')->mount($__name, $__params, $slug, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
     
        </div>
    </section>
 
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('section.feedback', ['code' => 'collback','senturl' => ''.e(url()->current()).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1415817719-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div><?php /**PATH /var/www/resources/views/compilation.blade.php ENDPATH**/ ?>