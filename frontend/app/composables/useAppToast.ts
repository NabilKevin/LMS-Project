export const useAppToast = () => {
  const toast = useToast();

  const success = (title: string, description?: string) => {
    toast.add({
      title: title,
      description: description,
      color: "secondary",
      id: "modal-secondary",
      ui: {
        root: "bg-white ring-black",
        title: "text-slate-800",
      },
    });
  };

  const error = (title: string, description?: string) => {
    toast.add({
      title: title,
      description: description,
      color: "error",
      id: "modal-error",
      ui: {
        root: "bg-white ring-black",
        title: "text-slate-800",
      },
    });
  };

  return { success, error };
};
