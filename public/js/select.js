document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var checkedCount = 0;
    var countSelect = document.querySelector('.count-select');
    var countSpan = countSelect.querySelector('span');

    function updateCheckedCount() {
        checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
        countSpan.textContent = checkedCount;
        if (checkedCount > 0) {
            countSelect.classList.remove('d-none');
        } else {
            countSelect.classList.add('d-none');
        }
    }

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                checkedCount++;
            } else {
                checkedCount--;
            }

            if (checkedCount >= 20) {
                checkboxes.forEach(function(box) {
                    if (!box.checked) {
                        box.disabled = true;
                    }
                });
            } else {
                checkboxes.forEach(function(box) {
                    box.disabled = false;
                });
            }
            updateCheckedCount();
        });
    });

    var images = document.querySelectorAll('.imageCard');
    images.forEach(function(image) {
        image.addEventListener('click', function() {
            var checkbox = image.closest('tr').querySelector('.checkboxItem');
            if (!checkbox.checked && checkedCount >= 20) {
                return;
            }
            checkbox.checked = !checkbox.checked;
            checkbox.dispatchEvent(new Event('change')); // Kích hoạt sự kiện change
        });
    });
});
