import type { Course } from "~/types/courses";

export default defineEventHandler(async (event) => {
  const token = getCookie(event, "auth_token");
  const config = useRuntimeConfig(event);
  const slug = getRouterParam(event, "slug");

  if (token) {
    try {
      const { data } = await $fetch<{
        success: boolean;
        message: string;
        data: Course;
      }>(`${config.apiBaseUrl}/students/courses/${slug}`, {
        method: "GET",
        headers: {
          Authorization: `Bearer ${token}`,
          Accept: "Application/json",
        },
      });

      return { data };
    } catch (e: any) {
      throw createError({
        statusCode: e?.response?.status || 500,
        message: e?.data?.message || "Error while getting data!",
      });
    }
  }
});
