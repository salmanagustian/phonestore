<template>
    <div class="flex flex-col h-screen">
        <div>
            <Navbar/>
        </div>
        <div class="flex-grow mt-8">
            <div class="container">
                <div class="flex flex-row gap-20">
                    <div class="basis-1/4">
                        <div class="flex flex-col space-y-4">
                            <div class="font-bold text-lg text-[#3C3C3F]">Filter</div>
                            <div class="mb-10 border border-slate-200"></div>
                            <div class="w-full border-[1px] border-[#D8D8D8] border-solid rounded-sm py-6 px-5">
                                <div class="flex items-center justify-start mb-8">
                                    <div class="mr-auto text-[#888888]">
                                        Rating 4 ke atas
                                    </div>
                                    <div>
                                        <div class="form-check">
                                            <input 
                                                class="w-4 h-4 my-1 align-top transition duration-200 bg-white bg-center bg-no-repeat 
                                                bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer 
                                                form-check-input checked:bg-[#74B71B] checked:border-[#74B71B] focus:outline-none" 
                                                type="checkbox" 
                                                value="1"
                                                v-model="checkedFilterRating" 
                                                id="flexCheckDefault3">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-start">
                                    <div class="mr-auto text-[#888888]">
                                        Stock Tersedia
                                    </div>
                                    <div>
                                        <div class="form-check">
                                            <input 
                                                class="w-4 h-4 my-1 align-top transition duration-200 bg-white bg-center bg-no-repeat 
                                                bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer 
                                                form-check-input checked:bg-[#74B71B] checked:border-[#74B71B] focus:outline-none" 
                                                type="checkbox" 
                                                value="2"
                                                v-model="checkedFilterStock" 
                                                id="flexCheckDefault3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basis-full">
                        <div class="flex flex-col space-y-4">
                            <div class="flex items-center">
                                <div class="mr-auto font-bold text-lg text-[#3C3C3F]">
                                    Product List
                                </div>
                                <div class="mr-4 text-[#888888] text-sm">Urutkan</div>
                                <div>
                                    <button class="btn btn-outline">
                                        <span class="text-sm font-light text-gray-400">Terbaru</span>
                                    </button>
                                </div>
                            </div>
                            <div class="border border-slate-200"></div>
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <ListProducts v-for="(gift, index) in filteredPhone" :gift="gift" :key="index"/>
                            </div>

                            <div class="flex">
                                <div class="ml-auto">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>

        <div class="mt-8">
            <Footer/>
        </div>
    </div>
</template>			

<script>
    import Navbar from './components/Navbar.vue';
    import Footer from './components/Footer.vue';
    import SectionFilter from './components/SectionFilter.vue';
    import SectionProduct from './components/SectionProduct.vue';
    import ListProducts from './components/ListProducts.vue';
    

    export default {
        name: 'Home',
    
        components: {
            Navbar,
            Footer,
            SectionFilter,
            SectionProduct,
            ListProducts,
        },

        data() {
            return {
                gifts: [],
                checkedFilterRating: '',
                checkedFilterStock: '',
            }
        },

        created() {
            axios.get('/api/v1/gifts')
                .then(({data}) => {
                    const giftsData = data.data;

                    this.gifts.push(...giftsData);
                }).catch((err) => console.log(err));
        },

        computed: {
            filteredPhone() {
                if(!this.checkedFilterStock && !this.checkedFilterRating)
                    return this.gifts;
                
                if(this.checkedFilterRating && this.checkedFilterStock)
                    return this.gifts.filter(gift => gift.attributes.rating > 4 && gift.attributes.stock > 0);
                    
                if(this.checkedFilterStock)
                    return this.gifts.filter(gift => gift.attributes.stock > 0);

                if(this.checkedFilterRating)
                    return this.gifts.filter(gift => gift.attributes.rating > 4);
            }
        },

        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }

                axios.get('/api/v1/gifts?page=' + page)
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        this.giftsData = data;
                    });
            }
        }
    }
</script>
