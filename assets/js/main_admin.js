
// Initialize jQuery UI components
const $ = window.jQuery // Declare the $ variable
$(document).ready(() => {
  // Datepicker
  $('input[type="date"]').datepicker({
    dateFormat: "yy-mm-dd",
  })

  // Delete confirmation
  $(".btn-outline-danger").click((e) => {
    e.preventDefault()
    if (!confirm("Are you sure you want to delete this item?")) {
      return false
    }
  })

  // Sidebar toggle for mobile
  $(".sidebar-toggle").click(() => {
    $(".sidebar").toggleClass("active")
  })

  // Close sidebar when clicking outside
  $(document).click((e) => {
    if (!$(e.target).closest(".sidebar, .sidebar-toggle").length) {
      $(".sidebar").removeClass("active")
    }
  })

  // Form validation
  $("form").submit(function (e) {
    var form = $(this)
    var isValid = true

    form.find("input[required], textarea[required], select[required]").each(function () {
      if ($(this).val().trim() === "") {
        $(this).addClass("is-invalid")
        isValid = false
      } else {
        $(this).removeClass("is-invalid")
      }
    })

    if (!isValid) {
      e.preventDefault()
      alert("Please fill out all required fields")
    }
  })

  // Notification badge
  $(".notification-btn").click(() => {
    alert("You have 3 new notifications")
  })

  // Search functionality
  $(".search-input").keyup(function () {
    var searchTerm = $(this).val().toLowerCase()
    $(".message-card, .card-title, .gallery-card").each(function () {
      var text = $(this).text().toLowerCase()
      if (text.indexOf(searchTerm) > -1) {
        $(this).closest(".col-md-6, .col-md-4, .col-md-3").show()
      } else {
        $(this).closest(".col-md-6, .col-md-4, .col-md-3").hide()
      }
    })
  })
})
