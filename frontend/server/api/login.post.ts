import type { LoginResponse } from "~/types/auth";

export default defineEventHandler(async (event): Promise<LoginResponse> => {
  const body = await readBody(event);
  const config = useRuntimeConfig(event);

  try {
    const res = await $fetch<{
      success: boolean;
      message: string;
      data: {
        token: string;
        user: LoginResponse["user"];
      };
    }>(`${config.apiBaseUrl}/login`, {
      method: "POST",
      body,
    });

    setCookie(event, "auth_token", res.data.token, {
      httpOnly: true,
      secure: !import.meta.dev,
      sameSite: "lax",
      maxAge: 60 * 60 * 24 * 7,
      path: "/",
    });

    setCookie(event, "user_data", JSON.stringify(res.data.user), {
      httpOnly: false,
      secure: !import.meta.dev,
      sameSite: "lax",
      maxAge: 60 * 60 * 24 * 7,
      path: "/",
    });
    return { user: res.data.user };
  } catch (e: any) {
    throw createError({
      statusCode: e?.response?.status || 500,
      message: e?.data?.message || "Login failed",
    });
  }
});
