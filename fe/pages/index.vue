<script lang="ts" setup>
import { ref, onMounted, nextTick } from "vue";
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

// State
const showTitle = ref(false);
const moveTitle = ref(false);
const showText = ref(false);
const showDescription = ref(false);

onMounted(async () => {
  await fetchProfile();
  await nextTick();

  setTimeout(() => (showTitle.value = true), 500);
  setTimeout(() => (moveTitle.value = true), 1500);
  setTimeout(() => (showText.value = true), 2000);
  setTimeout(() => (showDescription.value = true), 2500);
});
</script>

<template>
  <div
    v-if="profile"
    class="h-[calc(100vh-56px)] flex-1 flex flex-col items-center justify-center relative"
  >
    <div class="flex justify-center items-center gap-4 w-full px-8">
      <Transition name="fade">
        <div
          v-if="showTitle"
          :class="{
            'translate-x-[-30px] opacity-100': moveTitle,
            'opacity-0': !showTitle,
          }"
          class="flex items-center gap-4 transition-all duration-1000 ease-in-out"
        >
          <NuxtImg
            :src="profile.avatar"
            alt="Avatar"
            class="w-16 h-16 rounded-full"
          />
          <h1
            class="text-8xl text-center font-bold text-red-500 tracking-widest"
          >
            {{ profile.name }}
          </h1>
        </div>
      </Transition>

      <Transition name="fade">
        <p
          v-if="showText"
          class="text-start font-semibold text-slate-700 text-xl"
        >
          // {{ profile.job_title }}
        </p>
      </Transition>

      <Transition name="fade">
        <p
          v-if="showText"
          class="text-end font-semibold text-slate-700 text-xl"
        >
          // {{ profile.location }}
        </p>
      </Transition>
    </div>

    <Transition name="fade">
      <div
        v-if="showDescription"
        class="absolute bottom-8 text-center text-slate-500 text-lg"
      >
        <p>{{ profile.summary }}</p>
      </div>
    </Transition>
  </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s ease-in-out;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
