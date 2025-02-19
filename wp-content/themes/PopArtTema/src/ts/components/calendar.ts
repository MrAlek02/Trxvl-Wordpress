const calendar = () => {
  const dateInput = document.getElementById('dateInput');
  if (dateInput) {
    dateInput.addEventListener('click', function () {
      const date = <HTMLInputElement>document.getElementById('hiddenDate');
      date.showPicker();
    });

    document
      .getElementById('hiddenDate')
      ?.addEventListener('change', function (this: HTMLInputElement) {
        const dateInput = document.getElementById(
          'dateInput'
        ) as HTMLInputElement | null;
        if (dateInput) {
          dateInput.value = this.value ?? '';
        }
      });
    document
      .getElementById('dateInputSecond')
      .addEventListener('click', function () {
        const date = <HTMLInputElement>(
          document.getElementById('hiddenDateSecond')
        );
        date.showPicker();
      });

    document
      .getElementById('hiddenDateSecond')
      ?.addEventListener('change', function (this: HTMLInputElement) {
        const dateInput = document.getElementById(
          'dateInputSecond'
        ) as HTMLInputElement | null;
        if (dateInput) {
          dateInput.value = this.value ?? '';
        }
      });
  }
};
export default calendar;
