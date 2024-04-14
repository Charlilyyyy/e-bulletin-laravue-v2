<template>
    <div v-if="isOpen" class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span> 

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <!-- Modal content -->
                    <div>
                        <div class="flex">
                            <!-- Heroicon name: outline/check -->
                            <!-- <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg> -->
                            <img src="images/common/LOGO-TC-V1.png" alt="Logo" class="h-8 w-8 mr-2">
                            <h3 class="flex-1 text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                Create New Post
                            </h3>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <!-- <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                Create New Post
                            </h3> -->   
                            <!-- {{ post }} -->
                            <div class="mt-5 max-w-xl mx-auto">
                                <!-- <p class="text-sm text-gray-500">
                                <input type="text" placeholder=""/>
                                modal body
                                </p> -->
                                <input v-model="post.topic" class="w-full border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:border-b-2" type="text" placeholder="Enter topic/subject"/>
                                <textarea v-model="post.story" class="mt-3 w-full border-b border-gray-300 focus:border-indigo-500 focus:outline-none focus:border-b-2" placeholder="Enter the story here"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="createNewPost" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Create
                    </button>
                    <button @click="closeCreatePost" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits, reactive } from 'vue'

const post = reactive({
    topic: '',
    story: ''
})

const props = defineProps({
    isOpen: Boolean
})

const emit = defineEmits([
    'closeCreate',
    'createPost'
])

const closeCreatePost = () => {
    emit('closeCreate',false)
}

const resetForm = () => {
    post.topic = '',
    post.story = ''
}

const createNewPost = () => {
    if(post.topic != '' && post.story!=''){
        emit('createPost',post)
        closeCreatePost()
        resetForm()
    }else{
        console.log('please fill up')
    }
}



</script>