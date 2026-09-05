// composables/useAppModalConfirmation.ts
import ModalConfirmation from "~/components/ModalConfirmation.vue";

interface ModalBody {
  title: string;
  btnText1: string;
  btnText2: string;
}

export const useAppModalConfirmation = () => {
  const overlay = useOverlay();

  const confirm = async (modalBody: ModalBody): Promise<boolean> => {
    const modal = overlay.create(ModalConfirmation);
    const instance = modal.open(modalBody);
    return await instance.result;
  };

  return { confirm };
};
