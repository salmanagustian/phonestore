<template>
    <div class="flex flex-col h-screen">
        <div>
            <Navbar/>
        </div>
        <div class="flex-grow mt-8">
            <div class="container">
                <div class="flex flex-row gap-20">
                    <div class="basis-1/4">
                        <SectionFilter/>
                    </div>
                    <div class="basis-full">
                        <SectionProduct/>
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

        created() {
            
        }
    }
</script>
