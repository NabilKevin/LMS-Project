export const useAppToast = () => {
  const toast = useToast();

  const baseUi = {
    root: "bg-white ring-black",
    title: "text-slate-800",
  } as const;

  const success = (title: string, description?: string) => {
    toast.add({
      title,
      description,
      color: "secondary",
      ui: baseUi,
    });
  };

  const error = (title: string, description?: string) => {
    toast.add({
      title,
      description,
      color: "error",
      ui: baseUi,
    });
  };

  const warning = (title: string, description?: string) => {
    toast.add({ title, description, color: "warning", ui: baseUi });
  };
  return { success, error, warning };
};
