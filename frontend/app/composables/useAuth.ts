import { useApi } from "./useApi";

export const useAuth = () => {
  const login = async (credentials: any): Promise<any> => {
    try {
      const response = await useApi("/login", {
        method: "POST",
        body: credentials,
      });
      return response;
    } catch (error) {
      throw error;
    }
  };

  const logout = async () => {
    try {
      await useApi("/logout", {
        method: "POST",
      });

      const token = useCookie("auth_token");
      token.value = null;
      navigateTo("/login");
    } catch (error) {
      throw error;
    }
  };

  return { login, logout };
};
