const commentFormValidation = () => {
  const form = document.querySelector('#commentform');

  if (!form) return;

  const email = document.querySelector('#email')! as HTMLInputElement;
  const name = document.querySelector('#author')! as HTMLInputElement;
  const comment = document.querySelector('#comment')! as HTMLInputElement;

  const emailError = document.createElement('div');
  emailError.innerHTML = 'Email is not valid!';
  emailError.classList.add('comment-error-msg');
  emailError.style.display = 'none';
  if (email) {
    email.insertAdjacentElement('afterend', emailError);
  }

  const nameError = document.createElement('div');
  nameError.innerHTML = 'Name is not valid!';
  nameError.classList.add('comment-error-msg');
  nameError.style.display = 'none';
  if (name) {
    name.insertAdjacentElement('afterend', nameError);
  }

  const commentError = document.createElement('div');
  commentError.innerHTML = 'Comment is not valid!';
  commentError.classList.add('comment-error-msg');
  commentError.style.display = 'none';
  if (comment) {
    comment.insertAdjacentElement('afterend', commentError);
  }

  const validateEmail = () => {
    const re =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email?.value).toLowerCase());
  };

  const isFormValid = () => {
    let isEmailValid = true;
    let isNameValid = true;
    let isCommentValid = true;

    if (!validateEmail() && email) {
      isEmailValid = false;
      emailError.style.display = 'block';
    } else {
      emailError.style.display = 'none';
    }

    if (name?.value?.trim() === '' && name) {
      isEmailValid = false;
      nameError.style.display = 'block';
    } else {
      nameError.style.display = 'none';
    }

    if (comment.value.trim() === '') {
      isEmailValid = false;
      commentError.style.display = 'block';
    } else {
      commentError.style.display = 'none';
    }

    if (isEmailValid && isNameValid && isCommentValid) {
      return true;
    }
    return false;
  };

  form.addEventListener('submit', (e) => {
    if (!isFormValid()) {
      e.preventDefault();
    }
  });
};

export default commentFormValidation;
