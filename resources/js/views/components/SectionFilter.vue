<template>
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
                Stock Tersedia {{  checkedFilterStock }}
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
</template>

<script>
export default {
    name: 'FilterGift',

    data() {
        return {
            checkedFilterRating: '',
            checkedFilterStock: '',
        }
    },

   
}
</script>