<template>
  <div class="min-h-screen bg-slate-50 text-slate-900">
    <StudentSidebar />
    <main class="lg:pl-64">
      <StudentHeader />
      <div class="mx-auto max-w-[1440px] px-5 py-8 sm:px-8 lg:px-10">
        <slot />
      </div>
    </main>
  </div>
</template>
