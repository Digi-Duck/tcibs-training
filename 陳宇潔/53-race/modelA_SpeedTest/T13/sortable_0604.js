const groups = document.querySelectorAll('.group');
const cards = document.querySelectorAll('.card');

cards.forEach(element => {
    element.addEventListener("dragstart", (e) => {
        e.dataTransfer.setDragImage(new Image(), 0, 0); 
    });

    element.addEventListener("dragend", () => {
        element.classList.remove("dragging");
    });
    element.addEventListener("drag", (e) => {
        element.classList.add("dragging");
        element.style.left = (e.pageX ) + "px";
        element.style.top = (e.pageY ) + "px";
        // - element.offsetWidth / 2 - element.offsetHeight / 2
        updateGroupHeight()
    });
});

groups.forEach(group => {
    group.addEventListener("dragover", e => {
        e.preventDefault();
        const afterElement = getDragAfterElement(group, e.clientY);
        const draggableElement = document.querySelector(".dragging");
        if (afterElement == null) {
            group.appendChild(draggableElement);
        } else {
            group.insertBefore(draggableElement, afterElement);
            // afterElement.style.transform = `translateY(${afterElement.offsetHeight + 20}px)`
        }
    });
});

function getDragAfterElement(group, y) {
    const draggableElements = [...group.querySelectorAll(".card:not(.dragging)")];
    console.log(draggableElements);
    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;
        return (offset < 0 && offset > closest.offset) ? { offset, element: child } : closest;
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}
function updateGroupHeight() {
    groups.forEach(group => {
        const totalHeight = Array.from(group.children).reduce((total, child) => total + child.offsetHeight, 0);
        const newHeight = totalHeight + group.children.length * 20;
        group.style.height = `${newHeight}px`;
    });
}


