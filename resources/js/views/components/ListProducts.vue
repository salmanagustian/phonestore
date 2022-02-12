<template>
<div class="card group overflow-hidden">
	<div class="absolute top-0 right-0 " :class="gift.attributes.flag == 4 ? 'hidden' : 'block'">
		<img :src="giftFormatImage(gift.attributes.flag)" alt="Badge Hot Item" class="w-full h-auto">
	</div>
	<div v-show="gift.attributes.stock == 0" class="absolute top-0 bottom-0 right-0 left-0 bg-[#E1E8EE]/60"></div>
	<div v-show="gift.attributes.stock > 0" class="absolute top-0 bottom-0 right-0 left-0 opacity-0 
			group-hover:opacity-100 group-hover:bg-[#74B71B]/90 transition-all duration-200 ease-in">
		<div class="flex flex-col justify-center items-center min-h-full text-white space-y-6">
				<div class="text-2xl text-center">
					{{ gift.attributes.series }}
				</div>
				<button class="btn btn-outline w-60 text-sm">
					<router-link :to="`gift/${gift.id}`"> View Detail </router-link>
				</button>
		</div>
	</div>
	<div class="text-sm font-semibold" :class="stockFormatClass(gift.attributes.stock)">{{ gift.attributes.stock | stockFormatLabel }}</div>
	<div class="mx-auto">
		<img src="/images/phone-2x.png" class="object-contain w-full select-none " alt="Phone">
	</div>
	<div class="text-[#3C3C3F] min-h-[50px] flex-grow text-lg font-medium text-left cursor-pointer">
		<router-link :to="`gift/${gift.id}`">{{ gift.attributes.series }}</router-link>
	</div>
	<div class="flex items-center justify-between gap-3 mt-3">
		<div>
			<div class="flex gap-2">
				<img src="/images/badge-points.svg" alt="">
				<p class="text-sm text-success">{{ gift.attributes.points }} points</p>
			</div>
			<div class="flex flex-wrap items-center gap-2 mt-1">
				<span>
					<img src="/images/rating.svg" class="object-contain w-full" alt="Rating">
				</span>
				<span class="text-[#838EAB] text-sm font-light">{{ gift.attributes.total_reviews }} reviews</span>
			</div>
		</div>
		<div class="group">
			<button class="btn btn-outline group-hover:btn-heart">
				<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-gray-200 group-hover:fill-white group-hover:stroke-white" fill="none" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
				</svg>
			</button> 
		</div>
	</div>
</div>
</template>

<script>
    export default {
        name: 'ListProducts',

		props: ['gift'],

		filters: {
			stockFormatLabel(stock) {
				if(stock == 0)
					return 'Sold Out'
				else if(stock < 5)
					return 'Stock < 5'
				else
					return 'In Stock'
			}
		},

		methods: {
			stockFormatClass(stock) {
				if(stock == 0 || stock < 5)
					return 'text-pink-600'
				else
					return 'text-success'
			},

			giftFormatImage(flag) {
				if(flag == 1)
					return '/images/badge-newitem.png';
				else if(flag == 2)
					return '/images/badge-bestseller.png';
				else if(flag == 3)
					return '/images/badge-hotitem.png';
			}
		},
    }
</script>