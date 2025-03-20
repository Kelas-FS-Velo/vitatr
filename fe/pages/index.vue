<script lang="ts" setup>
import { ref, onMounted } from "vue";
import type { Profile } from "~/types/profile";

const profile = ref<Profile | null>(null);

const fetchProfile = async () => {
  try {
    const response = await fetch("http://127.0.0.1:8000/api/profile", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (!response.ok) {
      throw new Error("Failed to fetch profile");
    }

    profile.value = await response.json();
  } catch (error) {
    console.error("Error fetching profile:", error);
  }
};

onMounted(() => {
  fetchProfile();
});
</script>

<template>
  <div
    v-if="profile"
    class="h-[calc(100vh-40px)] flex-1 flex flex-col items-center justify-center"
  >
    <div class="flex justify-between items-center gap-4">
      <p class="text-start text-base">Fullstack //<br />Developer</p>
      <h1 class="text-8xl text-center font-bold text-red-500 tracking-widest">
        {{ profile.name }}
      </h1>
      <p class="text-end text-base">// Jakarta<br />Indonesia</p>
    </div>
    <div class="justify-end text-center">
      <p>{{ profile.summary }}</p>
    </div>
  </div>
</template>
