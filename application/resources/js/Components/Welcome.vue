<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
  <div>
    <div class="p-6 bg-white border-b border-gray-200 lg:p-8">
      <ApplicationLogo class="block w-auto h-12 mb-4" />
      <b>Please leave a star &#11088;</b>
      <br />
      <a href="https://github.com/perisicnikola37/laravel-inertia-vue-spa" target="_blank"><b
          style="color: #6875f5">Click here</b></a>
      <p class="mt-2 leading-relaxed text-gray-500">
        This SPA offers an all-in-one solution for managing users and roles, featuring an
        easy-to-use dashboard for administrators.
        <br />
        Built using Laravel+Inertia+Vue+Jetstream <br />
        by
        <a href="https://github.com/perisicnikola37" target="_blank"><b style="color: #6875f5">@perisicnikola37</b></a>
      </p>
      <div class="mt-5">
        <h1><b>Application analytics:</b></h1>
        User count: <span style="color: #6875f5">{{ $page.props.counts.userCount }}</span>
        <br />
        Role count: <span style="color: #6875f5">{{ $page.props.counts.roleCount }}</span>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-6 p-6 bg-gray-200 bg-opacity-25 md:grid-cols-2 lg:gap-8 lg:p-8">
      <div>
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            class="w-6 h-6 stroke-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
          </svg>
          <h2 class="ml-3 text-xl font-semibold text-gray-900">
            <a href="https://laravel.com/docs">Documentation</a>
          </h2>
        </div>

        <p class="mt-4 text-sm">
          <a target="_blank" href="https://github.com/perisicnikola37/laravel-inertia-vue-spa/blob/master/README.md"
            class="inline-flex items-center font-semibold text-indigo-700">
            Explore the repository documentation

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-1 fill-indigo-500">
              <path fill-rule="evenodd"
                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                clip-rule="evenodd" />
            </svg>
          </a>
        </p>
      </div>

      <div>
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            class="w-6 h-6 stroke-gray-400">
            <path stroke-linecap="round"
              d="M12 4.5c-3.523 0-6.375 2.747-6.375 6.125 0 3.11 3.472 6.486 6.119 9.18 2.648-2.694 6.119-6.07 6.119-9.18 0-3.378-2.852-6.125-6.375-6.125z" />
          </svg>

          <h2 class="ml-3 text-xl font-semibold text-gray-900">
            <a href="https://laracasts.com">Repository</a>
          </h2>
        </div>

        <p class="mt-4 text-sm">
          <a target="_blank" href="https://github.com/perisicnikola37/laravel-inertia-vue-spa"
            class="inline-flex items-center font-semibold text-indigo-700">
            Explore the repository

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-1 fill-indigo-500">
              <path fill-rule="evenodd"
                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                clip-rule="evenodd" />
            </svg>
          </a>
        </p>
      </div>
    </div>
  </div>
</template>
