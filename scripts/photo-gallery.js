document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.filter-menu button');
  const photos = document.querySelectorAll('.photo');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.className; // Use the button's class name as the filter

      // Show only photos matching the button's class name
      photos.forEach(photo => {
        if (photo.classList.contains(filter)) {
          photo.style.display = 'block';
        } else {
          photo.style.display = 'none';
        }
      });
    });
  });
});
