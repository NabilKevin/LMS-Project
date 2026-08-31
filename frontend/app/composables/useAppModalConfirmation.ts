import ModalConfirmation from "~/components/ModalConfirmation.vue";

export const useAppModalConfirmation = async (modalBody: {
  title: string;
  btnText1: string;
  btnText2: string;
}): Promise<boolean> => {
  const overlay = useOverlay();

  const modal = overlay.create(ModalConfirmation);

  const instance = modal.open(modalBody);

  const confirmation = await instance.result;

  return confirmation;
};
