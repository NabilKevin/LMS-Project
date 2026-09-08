export const useApi = async <T>(request: string, opts?: any) => {
  try {
    return await $fetch<T>(request, opts);
  } catch (error: any) {
    console.log(error.response);
    if (error.response?.status === 401) {
      console.warn("Sesi habis. Mengeluarkan user...");

      // Gunakan flag ?local=true agar Nuxt tidak repot-repot menghubungi Laravel lagi
      await $fetch("/api/auth/logout?local=true", { method: "POST" }).catch(
        () => {},
      );

      window.location.href = "/login";
    }

    throw error;
  }
};
