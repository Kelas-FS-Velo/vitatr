<template>
  <div
    class="px-8 py-4 h-10 w-full flex bg-white/30 dark:bg-black/30 backdrop-blur-lg shadow-lg justify-between items-center"
  >
    <h1 class="font-semibold">vita.</h1>
    <div class="flex gap-6">
      <NuxtLink to="/">Home</NuxtLink>
      <NuxtLink to="/about">About</NuxtLink>
      <NuxtLink to="/projects">Projects</NuxtLink>
    </div>
    <div class="flex gap-2">

      <NuxtLink to="#">Contact</NuxtLink>

    </div>
  </div>
</template>