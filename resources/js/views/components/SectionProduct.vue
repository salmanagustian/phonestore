<template>
<div class="flex flex-col space-y-4">
    <div class="flex items-center">
        <div class="mr-auto font-bold text-lg text-[#3C3C3F]">
            Product List
        </div>
        <div class="mr-4 text-[#888888] text-sm">Urutkan</div>
        <div>Button</div>
    </div>
    <div class="border border-slate-200"></div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <ListProducts/>
        <ListProducts/>
        <ListProducts/>
    </div>
</div>
</template>

<script>

import ListProducts from './ListProducts.vue';

export default {
    name: 'Product',

    components: {
        ListProducts,
    }
}
</script>