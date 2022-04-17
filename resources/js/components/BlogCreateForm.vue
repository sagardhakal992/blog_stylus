<template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form  @submit.prevent="formSubmit">
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label>
                            <input v-model="form.title" type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required>
                            <div class="text-red-500" v-if="form.errors.title">{{ form.errors.title }}</div>
                        </div>
                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label>
                            <textarea v-model="form.contents" name="content" class="border-2 border-gray-500">

                            </textarea>
                            <div class="text-red-500" v-if="form.errors.contents">{{ form.errors.contents }}</div>
                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Image <span class="text-red-500">*</span></label>
                            <input type="file" @input="form.image = $event.target.files[0]" />

                        </div>


                        <div class="flex p-1">
                            <select class="border-2 border-gray-300 border-r p-2" name="action">
                                <option>Save and Publish</option>
                                <option>Save Draft</option>
                            </select>
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</template>

<script>

export default {
    name: "BlogCreateForm",
    data()
    {
        return {
            form:this.$inertia.form({
                title:null,
                contents:null,
                image:null
            })
        };
    },
    methods:{
        formSubmit(e)
        {
           this.form.post('/blogs/store')
        }
    }

}
</script>


<style scoped>

</style>
