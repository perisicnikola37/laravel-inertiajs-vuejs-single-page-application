<template>
  <AppLayout title="Create role">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Create role</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="w-full max-w-xs m-auto">
          <form
            @submit.prevent="submit"
            class="px-8 pt-6 pb-8 m-auto mb-4 bg-white rounded shadow-md"
            enctype="multipart/form-data"
          >
            <div class="mb-4">
              <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                Role name <span class="text-red-500">*</span>
              </label>
              <input
                v-model="form.name"
                class="w-full px-3 py-2 mb-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="name"
                type="text"
              />
              <span class="text-red-500">{{ errors.name }}</span>
            </div>

            <div class="flex items-center justify-between">
              <Button :form="form"></Button>
            </div>
          </form>

          <p class="text-xs text-center text-gray-500">
            &copy; {{ $page.props.currentYear }} -
            <a
              class="text-blue-500"
              href="https://github.com/perisicnikola37"
              target="_blank"
              >@{{ $page.props.username }}</a
            >
          </p>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import Button from "@/Components/Button.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
  components: {
    AppLayout,
    Button,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
      }),
    };
  },
  methods: {
    submit() {
      this.form.post(this.route("roles.store"), {});
    },
  },
};
</script>
