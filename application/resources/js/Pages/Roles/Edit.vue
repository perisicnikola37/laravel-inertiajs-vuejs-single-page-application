<template>
  <AppLayout title="Edit role">
    <template #header>
      <Breadcrumb :href="'roles'" :title="'Roles'" :property="role" />
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="w-full max-w-xs m-auto">
          <form
            @submit.prevent="submit"
            class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md"
          >
            <div class="mb-4">
              <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                Role name
              </label>
              <input
                v-model="form.name"
                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="name"
                type="text"
              />
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
import Breadcrumb from "@/Components/Breadcrumb.vue";
import Button from "@/Components/Button.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
  components: {
    AppLayout,
    Breadcrumb,
    Button,
  },
  props: {
    role: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: this.role.name,
      }),
    };
  },
  methods: {
    submit() {
      this.form.put(this.route("roles.update", this.role.id), {});
    },
  },
};
</script>
