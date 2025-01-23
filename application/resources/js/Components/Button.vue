<template>
    <button :class="{ 'opacity-50': form.processing }" :disabled="form.processing"
        class="transition bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit">
        Save
    </button>
</template>

<script>
export default {
    props: {
        form: Object
    }
}
</script>