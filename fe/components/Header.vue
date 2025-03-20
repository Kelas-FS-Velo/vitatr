<template>
  <div
    class="px-8 py-4 h-14 w-full flex bg-white/30 dark:bg-black/30 backdrop-blur-lg shadow-lg justify-between items-center"
  >
    <h1
      class="font-semibold text-2xl bg-gradient-to-r from-red-600 to-slate-700 bg-clip-text text-transparent"
    >
      vita.
    </h1>

    <div class="flex gap-6">
      <NuxtLink
        to="/"
        class="transition-all duration-300 hover:font-bold hover:text-red-500"
      >
        Home
      </NuxtLink>
      <NuxtLink
        to="/about"
        class="transition-all duration-300 hover:font-bold hover:text-red-500"
      >
        About
      </NuxtLink>
      <NuxtLink
        to="/projects"
        class="transition-all duration-300 hover:font-bold hover:text-red-500"
      >
        Projects
      </NuxtLink>
    </div>

    <NuxtLink
      :to="`mailto:${profile?.email}`"
      class="transition-all duration-300 hover:font-bold hover:text-red-500 border-2 border-black px-3 py-1 rounded-full"
    >
      Contact
    </NuxtLink>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import type { Profile } from "~/types/profile";

const profile = ref<Profile | null>(null);

const fetchProfile = async () => {
  try {
    const response = await fetch("http://127.0.0.1:8000/api/profile");
    if (!response.ok) throw new Error("Failed to fetch profile");
    profile.value = await response.json();
  } catch (error) {
    console.error("Error fetching profile:", error);
  }
};

onMounted(() => {
  fetchProfile();
});
</script>
