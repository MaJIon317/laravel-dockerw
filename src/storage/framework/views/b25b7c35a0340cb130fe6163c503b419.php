<?php use \Illuminate\Support\Str; ?>
<?php if (isset($component)) { $__componentOriginaldf0c1f9d71acfa8b3005f4638b1a29f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf0c1f9d71acfa8b3005f4638b1a29f0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.card','data' => ['cols' => $cols,'rows' => $rows,'class' => $class]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cols' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cols),'rows' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rows),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class)]); ?>
    <?php if (isset($component)) { $__componentOriginal7ce092db05b46b96a8ad5ab4b8902a89 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ce092db05b46b96a8ad5ab4b8902a89 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.card-header','data' => ['name' => 'Slow Outgoing Requests','xBind:title' => '`Time: '.e(number_format($time)).'ms; Run at: ${formatDate(\''.e($runAt).'\')};`','details' => ''.e(is_array($config['threshold']) ? '' : $config['threshold'].'ms threshold, ').'past '.e($this->periodForHumans()).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::card-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'Slow Outgoing Requests','x-bind:title' => '`Time: '.e(number_format($time)).'ms; Run at: ${formatDate(\''.e($runAt).'\')};`','details' => ''.e(is_array($config['threshold']) ? '' : $config['threshold'].'ms threshold, ').'past '.e($this->periodForHumans()).'']); ?>
         <?php $__env->slot('icon', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal926969632268a5580344d514d4ffc3fb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal926969632268a5580344d514d4ffc3fb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.icons.cloud-arrow-up','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::icons.cloud-arrow-up'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal926969632268a5580344d514d4ffc3fb)): ?>
<?php $attributes = $__attributesOriginal926969632268a5580344d514d4ffc3fb; ?>
<?php unset($__attributesOriginal926969632268a5580344d514d4ffc3fb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal926969632268a5580344d514d4ffc3fb)): ?>
<?php $component = $__componentOriginal926969632268a5580344d514d4ffc3fb; ?>
<?php unset($__componentOriginal926969632268a5580344d514d4ffc3fb); ?>
<?php endif; ?>
         <?php $__env->endSlot(); ?>
         <?php $__env->slot('actions', null, []); ?> 
            <?php
                $count = count($config['groups']);
                $message = sprintf(
                    "URIs may be normalized using groups.\n\nThere %s currently %d %s configured.",
                    $count === 1 ? 'is' : 'are',
                    $count,
                    Str::plural('group', $count)
                );
            ?>
            <button title="<?php echo e($message); ?>" @click="alert(<?php echo \Illuminate\Support\Js::from($message)->toHtml() ?>)">
                <?php if (isset($component)) { $__componentOriginal95da57cee6437fd1b7658be6198e84c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95da57cee6437fd1b7658be6198e84c4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.icons.information-circle','data' => ['class' => 'w-5 h-5 stroke-gray-400 dark:stroke-gray-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::icons.information-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 stroke-gray-400 dark:stroke-gray-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95da57cee6437fd1b7658be6198e84c4)): ?>
<?php $attributes = $__attributesOriginal95da57cee6437fd1b7658be6198e84c4; ?>
<?php unset($__attributesOriginal95da57cee6437fd1b7658be6198e84c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95da57cee6437fd1b7658be6198e84c4)): ?>
<?php $component = $__componentOriginal95da57cee6437fd1b7658be6198e84c4; ?>
<?php unset($__componentOriginal95da57cee6437fd1b7658be6198e84c4); ?>
<?php endif; ?>
            </button>

            <?php if (isset($component)) { $__componentOriginal1b3e53436ecefa44bef3b401e2b29716 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b3e53436ecefa44bef3b401e2b29716 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.select','data' => ['wire:model.live' => 'orderBy','label' => 'Sort by','options' => [
                    'slowest' => 'slowest',
                    'count' => 'count',
                ],'@change' => 'loading = true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'orderBy','label' => 'Sort by','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                    'slowest' => 'slowest',
                    'count' => 'count',
                ]),'@change' => 'loading = true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b3e53436ecefa44bef3b401e2b29716)): ?>
<?php $attributes = $__attributesOriginal1b3e53436ecefa44bef3b401e2b29716; ?>
<?php unset($__attributesOriginal1b3e53436ecefa44bef3b401e2b29716); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b3e53436ecefa44bef3b401e2b29716)): ?>
<?php $component = $__componentOriginal1b3e53436ecefa44bef3b401e2b29716; ?>
<?php unset($__componentOriginal1b3e53436ecefa44bef3b401e2b29716); ?>
<?php endif; ?>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7ce092db05b46b96a8ad5ab4b8902a89)): ?>
<?php $attributes = $__attributesOriginal7ce092db05b46b96a8ad5ab4b8902a89; ?>
<?php unset($__attributesOriginal7ce092db05b46b96a8ad5ab4b8902a89); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7ce092db05b46b96a8ad5ab4b8902a89)): ?>
<?php $component = $__componentOriginal7ce092db05b46b96a8ad5ab4b8902a89; ?>
<?php unset($__componentOriginal7ce092db05b46b96a8ad5ab4b8902a89); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalbea25b6319928d1c693b59ced602f799 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbea25b6319928d1c693b59ced602f799 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.scroll','data' => ['expand' => $expand,'wire:poll.5s' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::scroll'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['expand' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($expand),'wire:poll.5s' => '']); ?>
        <?php if($slowOutgoingRequests->isEmpty()): ?>
            <?php if (isset($component)) { $__componentOriginal5fa7cfb847383b1e105a397b36250360 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5fa7cfb847383b1e105a397b36250360 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.no-results','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::no-results'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5fa7cfb847383b1e105a397b36250360)): ?>
<?php $attributes = $__attributesOriginal5fa7cfb847383b1e105a397b36250360; ?>
<?php unset($__attributesOriginal5fa7cfb847383b1e105a397b36250360); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5fa7cfb847383b1e105a397b36250360)): ?>
<?php $component = $__componentOriginal5fa7cfb847383b1e105a397b36250360; ?>
<?php unset($__componentOriginal5fa7cfb847383b1e105a397b36250360); ?>
<?php endif; ?>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal57b56d9bf4bb712ab0672e731342ca20 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal57b56d9bf4bb712ab0672e731342ca20 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <colgroup>
                    <col width="0%" />
                    <col width="100%" />
                    <col width="0%" />
                    <col width="0%" />
                </colgroup>
                <?php if (isset($component)) { $__componentOriginala671ab62c9d1ec15f3a4b40b3dc642f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala671ab62c9d1ec15f3a4b40b3dc642f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.thead','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::thead'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <tr>
                        <?php if (isset($component)) { $__componentOriginalb946e47637b44b2c956915152ad6423b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb946e47637b44b2c956915152ad6423b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.th','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Method <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb946e47637b44b2c956915152ad6423b)): ?>
<?php $attributes = $__attributesOriginalb946e47637b44b2c956915152ad6423b; ?>
<?php unset($__attributesOriginalb946e47637b44b2c956915152ad6423b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb946e47637b44b2c956915152ad6423b)): ?>
<?php $component = $__componentOriginalb946e47637b44b2c956915152ad6423b; ?>
<?php unset($__componentOriginalb946e47637b44b2c956915152ad6423b); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalb946e47637b44b2c956915152ad6423b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb946e47637b44b2c956915152ad6423b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.th','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>URI <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb946e47637b44b2c956915152ad6423b)): ?>
<?php $attributes = $__attributesOriginalb946e47637b44b2c956915152ad6423b; ?>
<?php unset($__attributesOriginalb946e47637b44b2c956915152ad6423b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb946e47637b44b2c956915152ad6423b)): ?>
<?php $component = $__componentOriginalb946e47637b44b2c956915152ad6423b; ?>
<?php unset($__componentOriginalb946e47637b44b2c956915152ad6423b); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalb946e47637b44b2c956915152ad6423b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb946e47637b44b2c956915152ad6423b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.th','data' => ['class' => 'text-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-right']); ?>Count <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb946e47637b44b2c956915152ad6423b)): ?>
<?php $attributes = $__attributesOriginalb946e47637b44b2c956915152ad6423b; ?>
<?php unset($__attributesOriginalb946e47637b44b2c956915152ad6423b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb946e47637b44b2c956915152ad6423b)): ?>
<?php $component = $__componentOriginalb946e47637b44b2c956915152ad6423b; ?>
<?php unset($__componentOriginalb946e47637b44b2c956915152ad6423b); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalb946e47637b44b2c956915152ad6423b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb946e47637b44b2c956915152ad6423b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.th','data' => ['class' => 'text-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-right']); ?>Slowest <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb946e47637b44b2c956915152ad6423b)): ?>
<?php $attributes = $__attributesOriginalb946e47637b44b2c956915152ad6423b; ?>
<?php unset($__attributesOriginalb946e47637b44b2c956915152ad6423b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb946e47637b44b2c956915152ad6423b)): ?>
<?php $component = $__componentOriginalb946e47637b44b2c956915152ad6423b; ?>
<?php unset($__componentOriginalb946e47637b44b2c956915152ad6423b); ?>
<?php endif; ?>
                    </tr>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala671ab62c9d1ec15f3a4b40b3dc642f2)): ?>
<?php $attributes = $__attributesOriginala671ab62c9d1ec15f3a4b40b3dc642f2; ?>
<?php unset($__attributesOriginala671ab62c9d1ec15f3a4b40b3dc642f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala671ab62c9d1ec15f3a4b40b3dc642f2)): ?>
<?php $component = $__componentOriginala671ab62c9d1ec15f3a4b40b3dc642f2; ?>
<?php unset($__componentOriginala671ab62c9d1ec15f3a4b40b3dc642f2); ?>
<?php endif; ?>
                <tbody>
                    <?php $__currentLoopData = $slowOutgoingRequests->take(100); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr wire:key="<?php echo e($request->method.$request->uri); ?>-spacer" class="h-2 first:h-0"></tr>
                        <tr wire:key="<?php echo e($request->method.$request->uri); ?>-row">
                            <?php if (isset($component)) { $__componentOriginal0f7c58665987afe4db27bde6fd86e915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f7c58665987afe4db27bde6fd86e915 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.td','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php if (isset($component)) { $__componentOriginalc9b15e206cf33d091e22b22086ace534 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc9b15e206cf33d091e22b22086ace534 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.http-method-badge','data' => ['method' => $request->method]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::http-method-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['method' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($request->method)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc9b15e206cf33d091e22b22086ace534)): ?>
<?php $attributes = $__attributesOriginalc9b15e206cf33d091e22b22086ace534; ?>
<?php unset($__attributesOriginalc9b15e206cf33d091e22b22086ace534); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc9b15e206cf33d091e22b22086ace534)): ?>
<?php $component = $__componentOriginalc9b15e206cf33d091e22b22086ace534; ?>
<?php unset($__componentOriginalc9b15e206cf33d091e22b22086ace534); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f7c58665987afe4db27bde6fd86e915)): ?>
<?php $attributes = $__attributesOriginal0f7c58665987afe4db27bde6fd86e915; ?>
<?php unset($__attributesOriginal0f7c58665987afe4db27bde6fd86e915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f7c58665987afe4db27bde6fd86e915)): ?>
<?php $component = $__componentOriginal0f7c58665987afe4db27bde6fd86e915; ?>
<?php unset($__componentOriginal0f7c58665987afe4db27bde6fd86e915); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal0f7c58665987afe4db27bde6fd86e915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f7c58665987afe4db27bde6fd86e915 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.td','data' => ['class' => 'max-w-[1px]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-w-[1px]']); ?>
                                <div class="flex items-center" title="<?php echo e($request->uri); ?>">
                                    <?php if($host = parse_url($request->uri, PHP_URL_HOST)): ?>
                                        <img wire:ignore src="https://unavatar.io/<?php echo e($host); ?>?fallback=false" loading="lazy" class="w-4 h-4 mr-2" onerror="this.style.display='none'" />
                                    <?php endif; ?>
                                    <code class="block text-xs text-gray-900 dark:text-gray-100 truncate">
                                        <?php echo e($request->uri); ?>

                                    </code>
                                </div>
                                <?php if(is_array($config['threshold'])): ?>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        <?php echo e($request->threshold); ?>ms threshold
                                    </p>
                                <?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f7c58665987afe4db27bde6fd86e915)): ?>
<?php $attributes = $__attributesOriginal0f7c58665987afe4db27bde6fd86e915; ?>
<?php unset($__attributesOriginal0f7c58665987afe4db27bde6fd86e915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f7c58665987afe4db27bde6fd86e915)): ?>
<?php $component = $__componentOriginal0f7c58665987afe4db27bde6fd86e915; ?>
<?php unset($__componentOriginal0f7c58665987afe4db27bde6fd86e915); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal0f7c58665987afe4db27bde6fd86e915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f7c58665987afe4db27bde6fd86e915 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.td','data' => ['numeric' => true,'class' => 'text-gray-700 dark:text-gray-300 font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['numeric' => true,'class' => 'text-gray-700 dark:text-gray-300 font-bold']); ?>
                                <?php if($config['sample_rate'] < 1): ?>
                                    <span title="Sample rate: <?php echo e($config['sample_rate']); ?>, Raw value: <?php echo e(number_format($request->count)); ?>">~<?php echo e(number_format($request->count * (1 / $config['sample_rate']))); ?></span>
                                <?php else: ?>
                                    <?php echo e(number_format($request->count)); ?>

                                <?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f7c58665987afe4db27bde6fd86e915)): ?>
<?php $attributes = $__attributesOriginal0f7c58665987afe4db27bde6fd86e915; ?>
<?php unset($__attributesOriginal0f7c58665987afe4db27bde6fd86e915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f7c58665987afe4db27bde6fd86e915)): ?>
<?php $component = $__componentOriginal0f7c58665987afe4db27bde6fd86e915; ?>
<?php unset($__componentOriginal0f7c58665987afe4db27bde6fd86e915); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal0f7c58665987afe4db27bde6fd86e915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f7c58665987afe4db27bde6fd86e915 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'pulse::components.td','data' => ['numeric' => true,'class' => 'text-gray-700 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('pulse::td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['numeric' => true,'class' => 'text-gray-700 dark:text-gray-300']); ?>
                                <?php if($request->slowest === null): ?>
                                    <strong>Unknown</strong>
                                <?php else: ?>
                                    <strong><?php echo e(number_format($request->slowest) ?: '<1'); ?></strong> ms
                                <?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f7c58665987afe4db27bde6fd86e915)): ?>
<?php $attributes = $__attributesOriginal0f7c58665987afe4db27bde6fd86e915; ?>
<?php unset($__attributesOriginal0f7c58665987afe4db27bde6fd86e915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f7c58665987afe4db27bde6fd86e915)): ?>
<?php $component = $__componentOriginal0f7c58665987afe4db27bde6fd86e915; ?>
<?php unset($__componentOriginal0f7c58665987afe4db27bde6fd86e915); ?>
<?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal57b56d9bf4bb712ab0672e731342ca20)): ?>
<?php $attributes = $__attributesOriginal57b56d9bf4bb712ab0672e731342ca20; ?>
<?php unset($__attributesOriginal57b56d9bf4bb712ab0672e731342ca20); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal57b56d9bf4bb712ab0672e731342ca20)): ?>
<?php $component = $__componentOriginal57b56d9bf4bb712ab0672e731342ca20; ?>
<?php unset($__componentOriginal57b56d9bf4bb712ab0672e731342ca20); ?>
<?php endif; ?>

            <?php if($slowOutgoingRequests->count() > 100): ?>
                <div class="mt-2 text-xs text-gray-400 text-center">Limited to 100 entries</div>
            <?php endif; ?>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbea25b6319928d1c693b59ced602f799)): ?>
<?php $attributes = $__attributesOriginalbea25b6319928d1c693b59ced602f799; ?>
<?php unset($__attributesOriginalbea25b6319928d1c693b59ced602f799); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbea25b6319928d1c693b59ced602f799)): ?>
<?php $component = $__componentOriginalbea25b6319928d1c693b59ced602f799; ?>
<?php unset($__componentOriginalbea25b6319928d1c693b59ced602f799); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf0c1f9d71acfa8b3005f4638b1a29f0)): ?>
<?php $attributes = $__attributesOriginaldf0c1f9d71acfa8b3005f4638b1a29f0; ?>
<?php unset($__attributesOriginaldf0c1f9d71acfa8b3005f4638b1a29f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf0c1f9d71acfa8b3005f4638b1a29f0)): ?>
<?php $component = $__componentOriginaldf0c1f9d71acfa8b3005f4638b1a29f0; ?>
<?php unset($__componentOriginaldf0c1f9d71acfa8b3005f4638b1a29f0); ?>
<?php endif; ?>
<?php /**PATH /var/www/vendor/laravel/pulse/resources/views/livewire/slow-outgoing-requests.blade.php ENDPATH**/ ?>