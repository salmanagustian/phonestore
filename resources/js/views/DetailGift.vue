<template>
    <div v-if="gift.attributes">
        <div class="container">
            <div class="flex flex-row space-x-2 select-none">
                <div class="flex-shrink-0">
                    <a @click="$router.go(-1)" class="cursor-pointer">List Product > </a>
                </div>
                <div>
                    {{ gift.attributes.series }}
                </div>
            </div>
            <div class="flex flex-col lg:flex-row lg:gap-8 my-10">
                <div class="lg:basis-3/4 xl:basis-2/5">
                    <div class="relative select-none">
                        <div class="absolute top-[-6px] right-[-7px]" :class="gift.attributes.flag == 4 ? 'hidden' : 'block'">
                            <img v-if="gift.attributes.flag" :src="giftFormatImage(gift.attributes.flag)" alt="Badge Hot Item">
                        </div>
                        <img src="/images/phone-2x.png" class="object-contain mx-auto" alt="Phone">
                    </div>
                </div>
                <div class="lg:basis-7/12 xl:basis-2/5">
                    <div class="flex flex-col space-y-8">
                    <div>
                        <div class="text-2xl font-bold text-[#262626]">{{ gift.attributes.series }}</div>
                        <div class="flex items-center gap-3 my-4">
                            <span>
                                <img src="/images/rating.svg" class="object-contain w-full h-4" alt="Rating">
                            </span>
                            <span class="text-[#838EAB] text-sm font-light">{{ gift.attributes.total_reviews }} reviews</span>
                        </div>
                        <div class="flex">
                            <div class="flex items-center gap-2">
                                <img src="/images/badge-points-detail.svg" class="w-4 h-4" alt="Badge Points Detail">
                                <p class="text-xl font-bold text-success">{{ gift.attributes.points }} poins</p>
                                <p class="ml-4 font-semibold" :class="stockFormatClass(gift.attributes.stock)">{{ gift.attributes.stock |  stockFormatLabel }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#262626] font-medium text-md">
                            {{ gift.attributes.screen }} Memori: {{ gift.attributes.memory }} Sistem Operasi {{ gift.attributes.operation_system }}
                        </p>
                    </div>
                    <div>
                        Jumlah
                    </div>
                    <div class="flex flex-col md:flex-row flex-wrap justify-start items-start space-y-2 md:space-y-0 md:space-x-2">
                        <div class="flex-shrink-0">
                            <button class="w-16 h-12 btn btn-heart">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>             
                            </button>
                            <button class="w-40 h-12 btn btn-redeem">
                                <span class="text-sm font-light text-white">Redeem</span>
                            </button>
                        </div>
                        <div>
                            <button class="w-40 h-12 btn btn-outline-add-chart">
                                Add to chart
                            </button>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Info Produk -->
        <div class="flex mt-10 px-6 py-10 bg">
            <div class="mx-auto">
                <div class="text-lg font-medium text-success">Info Produk</div>
                <div class="mt-8 border border-[#79B625]"></div>
                <div class="text-[#7EB3A5] font-medium text-xl my-10">Rincian</div>
                <div class="flex flex-col items-start justify-start space-y-8 font-light">
                    <div>Ukuran Layar: {{ gift.attributes.screen }}</div>
                    <div>Memori: {{ gift.attributes.memory }}</div>
                    <div>
                        Sistem Operasi: {{ gift.attributes.operation_system }}
                    </div>
                    <div>
                        CPU: {{ gift.attributes.cpu }}
                    </div>
                    <div>
                        Kamera: {{ gift.attributes.camera }}
                    </div>
                    <div>
                        SIM: {{ gift.attributes.sim }}
                    </div>
                    <div>
                        Baterai: {{ gift.attributes.battery }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>			

<script>
    import ButtonHeart from './components/ButtonHeart.vue';

    export default {
        name: 'DetailGift',

        components: {
            ButtonHeart,
        },

        data(){
            return {
                gift: {}
            }
        },

        created() {
            this.fetchDetailData();
        },

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

            async fetchDetailData() {
                const id = this.$route.params.id
                
                const {data} = await axios.get(`/api/v1/gifts/${id}`);
                const giftData = await data.data;
                this.gift = await giftData;
            },

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

<style scoped>
.bg {
    background: url('/images/batikbackground.svg');
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
