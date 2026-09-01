import type { LoginResponse } from "~/types/auth";

export const useAuth = () => {
  const login = async (credentials: {
    email: string;
    password: string;
  }): Promise<LoginResponse> => {
    return await $fetch<LoginResponse>("/api/login", {
      method: "POST",
      body: credentials,
    });
  };

  const logout = async () => {
    await $fetch("/api/logout", { method: "POST" });
    await navigateTo("/login");
  };

  return { login, logout };
};
