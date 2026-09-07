import type { LoginResponse } from "~/types/auth";
import { useApi } from "./useApi";

export const useAuth = () => {
  const userCookie = useCookie<LoginResponse["user"] | null>("user_data");

  const user = computed(() => userCookie.value);
  const isAuthenticated = computed(() => !!userCookie.value?.role);

  const login = async (credentials: {
    email: string;
    password: string;
  }): Promise<LoginResponse> => {
    return await useApi<LoginResponse>("/api/auth/login", {
      method: "POST",
      body: credentials,
    });
  };

  const logout = async () => {
    await useApi("/api/auth/logout", { method: "POST" });
    await navigateTo("/login");
  };

  return { user, isAuthenticated, login, logout };
};
