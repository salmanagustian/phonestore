<template>
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-20 mb-10">
            <div class="basis-full md:basis-1/4 lg:basis-2/4 xl:basis-1/4">
                <div class="flex flex-col space-y-5">
                    <div class="flex justify-startitems-center">
                        <div class="font-bold text-lg text-[#3C3C3F]">Filter</div>
                    </div>
                    <div class="mb-10 border border-slate-200"></div>
                    <div class="w-full border-[1px] border-[#D8D8D8] border-solid rounded-sm py-6 px-5">
                        <div class="flex items-center justify-start mb-8">
                            <div class="mr-auto text-[#888888] text-base">
                                Rating 4 ke atas
                            </div>
                            <div>
                                <div class="form-check-inline">
                                    <input 
                                        class="w-4 h-4 my-1 align-top transition duration-200 bg-white bg-center bg-no-repeat 
                                        bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer 
                                        form-check-input checked:bg-[#74B71B] checked:border-[#74B71B] focus:outline-none" 
                                        type="checkbox" 
                                        value="1"
                                        v-model="checkedFilterRating">
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-start">
                            <div class="mr-auto text-[#888888] text-base">
                                Stock Tersedia
                            </div>
                            <div>
                                <div class="form-check-inline">
                                    <input 
                                        class="w-4 h-4 my-1 align-top transition duration-200 bg-white bg-center bg-no-repeat 
                                        bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer 
                                        form-check-input checked:bg-[#74B71B] checked:border-[#74B71B] focus:outline-none" 
                                        type="checkbox" 
                                        value="2"
                                        v-model="checkedFilterStock">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:basis-full">
                <div class="flex flex-col space-y-4">
                    <div class="flex flex-wrap justify-start items-center">
                        <div class="mr-auto font-bold text-lg text-[#3C3C3F]">
                            Product List
                        </div>
                        <!-- <div class="mr-4 text-[#888888] text-xs">Urutkan</div>
                        <div>
                            <button class="w-40 px-5 py-1 rounded-full
                                font-medium align-middle select-none text-base btn-outline">
                                <span class="text-sm font-light text-gray-400">Terbaru</span>
                            </button>
                        </div> -->
                    </div>
                    <div class="border border-slate-200"></div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                        <div class="text-gray-500" v-if="filteredPhone.length == 0">Data tidak ditemukan</div>
                        <ListProducts v-for="(gift, index) in filteredPhone" :gift="gift" :key="index"/>
                    </div>
                </div>

                 <!-- Pagination -->
                <div v-if="gifts.length" class="flex items-center justify-center mt-10 mb-5">
                    <div v-if="pagination_links.prev !== null" :class="classCursorPrev" class="w-8 mr-1 flex justify-center"  @click="getResults(null, pagination_links.prev)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </div>
                    <div v-else class="w-8 mr-1 flex justify-center" :class="classCursorPrev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </div>
                    <div class="flex items-center h-8 font-medium select-none">
                        <div class="w-6 h-6 md:flex justify-center items-center 
                            cursor-pointer leading-5 transition 
                            duration-150 ease-in text-sm" :class="{ paginationActive: n == paginations.current_page  }" v-for="n in paginations.last_page" :key="n" @click="getResults(n, null)">
                            {{ n }}    
                        </div>
                    </div>
                    <div v-if="pagination_links.next !== null" class="w-8 ml-1 flex justify-center"  @click="getResults(null, pagination_links.next)">
                        <svg xmlns="http://www.w3.org/2000/svg" :class="classCursorNext" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                    <div v-else class="w-8 ml-1 flex justify-center" :class="classCursorNext">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </div>
            </div>
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
                pagination_links: {
                    first: '',
                    last: '',
                    prev: '',
                    next: '',
                },
                paginations: {
                    current_page: '',
                    from: '',
                    last_page: '',
                    path: '',
                    per_page: '',
                    to: '',
                    total: '',
                },
                currentPage : 1,
            }
        },

        created() {
           this.getResults(this.currentPage, null);
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
            },

            classCursorPrev() {
                return {
                    'cursor-pointer text-gray-700': this.pagination_links.prev !== null,
                    'cursor-not-allowed text-gray-400': this.pagination_links.prev === null,
                }
            },

            classCursorNext() {
                return {
                    'cursor-pointer text-gray-700': this.pagination_links.next !== null,
                    'cursor-not-allowed text-gray-400': this.pagination_links.next === null,
                }
            },
        },

        methods: {
            getResults(page, urlPage=null) {

                let url = '';

                if(urlPage !== null)
                    url += urlPage;
                else
                    url += `/api/v1/gifts?page=${page}`;

                 axios.get(`${url}`)
                .then(({data}) => {
                    const giftsData = data.data;
                    const links = data.links;
                    const pagination = data.meta;


                    this.gifts = giftsData;

                    // pagination links
                    this.pagination_links.first = links.first;
                    this.pagination_links.last = links.last;
                    this.pagination_links.prev = links.prev;
                    this.pagination_links.next = links.next;

                    // pagination
                    this.paginations.current_page = pagination.current_page;
                    this.paginations.from = pagination.from;
                    this.paginations.last_page = pagination.last_page;
                    this.paginations.path = pagination.path;
                    this.paginations.per_page = pagination.per_page;
                    this.paginations.to = pagination.to;
                    this.paginations.total = pagination.total;

                    document.getElementById('app').scrollIntoView({ behavior: 'smooth' });
                }).catch((err) => console.log(err));
            },
        }
    }
</script>
