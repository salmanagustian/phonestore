<template>
	<div class="card">
		<div class="absolute top-[-6px] right-[-7px]">
			<img src="images/badge-hotitem.png" alt="Badge Hot Item">
		</div>
		<div class="flex flex-col justify-start space-y-2">
			<div class="text-sm text-success">In Stock</div>
			<div class="mx-auto">
				<img src="images/phone-2x.png" class="object-contain w-full" alt="Phone">
			</div>
			<div class="text-[#3C3C3F] text-lg font-medium text-left">
				Samsung Galaxy S9-Midnight Black 4/64 GB
			</div>
			<div class="flex items-end justify-between gap-3">
				<div>
					<div class="flex gap-2">
						<img src="images/badge-points.svg" alt="">
						<p class="text-sm text-success">20000 points</p>
					</div>
					<div class="flex items-center gap-2 mt-1">
						<span>
							<img src="images/rating.svg" class="object-contain w-full" alt="Rating">
						</span>
						<span class="text-[#838EAB] text-sm font-light">160 reviews</span>
					</div>
				</div>
				<div>
					<button class="btn btn-outline-heart">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="stroke-slate-500">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
						</svg>
						<!-- <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20">
							<path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
						</svg> -->
					</button> 
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        name: 'ListProducts'
    }
</script>