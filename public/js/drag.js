class GridDraggable {
	constructor(gridElement) {
		this.grid = gridElement;
		this.interactiveElements = this.grid.querySelectorAll(".interactive");
		this.draggedElement = null;
		this.order = [];

		this.initDragAndDrop();
		this.updateOrder();
	}

	initDragAndDrop() {
		this.interactiveElements.forEach((element) => {
			element.addEventListener("dragstart", (event) => this.handleDragStart(event));
			element.addEventListener("dragend", (event) => this.handleDragEnd(event));
			element.addEventListener("dragover", (event) => this.handleDragOver(event));
			element.addEventListener("dragenter", (event) => this.handleDragEnter(event));
		});
	}

	handleDragStart(event) {
		this.draggedElement = event.target;
		event.target.classList.add("dragging");
	}

	handleDragEnd(event) {
		event.target.classList.remove("dragging");
		this.updateOrder();
	}

	handleDragOver(event) {
		event.preventDefault();
	}

	handleDragEnter(event) {
		event.preventDefault();
		if (event.target !== this.draggedElement && event.target.classList.contains("interactive")) {
			const draggedRow = parseInt(window.getComputedStyle(this.draggedElement).gridRow);
			const targetRow = parseInt(window.getComputedStyle(event.target).gridRow);

			if (draggedRow !== targetRow) {
				// Меняем grid-row у перетаскиваемого элемента
				this.draggedElement.style.gridRow = targetRow;

				// Меняем grid-row у целевого элемента
				event.target.style.gridRow = draggedRow;

				this.updateOrder();
			}
		}
	}

	updateOrder() {
		this.order = Array.from(this.interactiveElements).map((element) => {
			return {
				id: element.id,
				row: parseInt(window.getComputedStyle(element).gridRow),
			};
		});
	}

	getOrder() {
		return this.order;
	}
}

// Создаем экземпляры класса для всех элементов с классом quest__relation--grid
const gridDraggables = [];
document.querySelectorAll(".quest__relation--grid").forEach((grid) => {
	const gridDraggable = new GridDraggable(grid);
	gridDraggables.push(gridDraggable);
});
