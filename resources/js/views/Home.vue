<template>
    <div>
        <Navbar/>
        <div class="container">

            <div class="flex flex-row gap-20 mt-8">
                <div class="basis-1/4">
                    <SectionFilter/>
                </div>
                <div class="basis-full">
                    <SectionProduct/>
                </div>
            </div>    
        
        </div>


        <Footer/>
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
