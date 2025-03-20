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
  <div class="h-[calc(100vh-56px)] flex-1 flex items-center justify-center">
    <div class="">This is about page
    </div>
  </div>
</template>
