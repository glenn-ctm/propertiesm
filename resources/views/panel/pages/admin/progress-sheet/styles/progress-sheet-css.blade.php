<style>
/* Base for label styling */
.checkboxes [type="checkbox"]:not(:checked),
.checkboxes [type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
.checkboxes [type="checkbox"]:not(:checked) + label,
.checkboxes [type="checkbox"]:checked + label {
  position: relative;
  cursor: pointer;
}
/* checked mark aspect */
.checkboxes [type="checkbox"]:not(:checked) + label:after,
.checkboxes [type="checkbox"]:checked + label:after {
  content: '\2573\0020';
  position: absolute;
  top: .10em;
  left: 5%;
  font-size: 1.3em;
  line-height: 0.8;
  color: red;
  transition: all .2s;
  font-family: 'Lucida Sans Unicode', 'Arial Unicode MS', Arial;
}
/* checked mark aspect changes */
.checkboxes [type="checkbox"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
.modal {
      transition: opacity 0.25s ease;
    }
body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
}
.dlete-button {
  cursor: pointer !important;
}

/* Admin Sidenav */
.material-icons.menu {
    font-size: 2rem;
}

</style>
