// Funciones JavaScript para mejorar la experiencia del usuario
document.addEventListener("DOMContentLoaded", () => {
    // Auto-ocultar alertas después de 5 segundos
    const alerts = document.querySelectorAll(".alert")
    alerts.forEach((alert) => {
      setTimeout(() => {
        alert.style.opacity = "0"
        setTimeout(() => {
          alert.style.display = "none"
        }, 300)
      }, 5000)
    })
  
    // Confirmar eliminación
    const deleteButtons = document.querySelectorAll('a[onclick*="confirm"]')
    deleteButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        if (!confirm("¿Estás seguro de que deseas eliminar este registro? Esta acción no se puede deshacer.")) {
          e.preventDefault()
        }
      })
    })
  
    // Validación de formularios
    const forms = document.querySelectorAll("form")
    forms.forEach((form) => {
      form.addEventListener("submit", (e) => {
        const requiredFields = form.querySelectorAll("[required]")
        let isValid = true
  
        requiredFields.forEach((field) => {
          if (!field.value.trim()) {
            field.style.borderColor = "#f44336"
            isValid = false
          } else {
            field.style.borderColor = "#e1e5e9"
          }
        })
  
        if (!isValid) {
          e.preventDefault()
          alert("Por favor, complete todos los campos obligatorios.")
        }
      })
    })
  
    // Actualizar hora actual cada minuto
    const horaInput = document.getElementById("hora")
    if (horaInput && !horaInput.value) {
      setInterval(() => {
        const now = new Date()
        const hours = String(now.getHours()).padStart(2, "0")
        const minutes = String(now.getMinutes()).padStart(2, "0")
        horaInput.value = hours + ":" + minutes
      }, 60000)
    }
  
    // Cambiar color del estado según la selección
    const estadoSelect = document.getElementById("estado")
    if (estadoSelect) {
      estadoSelect.addEventListener("change", function () {
        const estado = this.value.toLowerCase()
        this.className = "form-control status-" + estado
      })
    }
  })
  
  // Función para exportar datos (funcionalidad adicional)
  function exportarDatos() {
    // Esta función se puede implementar para exportar los datos a Excel o PDF
    alert("Funcionalidad de exportación en desarrollo")
  }
  
  // Función para filtrar registros (funcionalidad adicional)
  function filtrarRegistros() {
    // Esta función se puede implementar para filtrar los registros por fecha, estado, etc.
    alert("Funcionalidad de filtrado en desarrollo")
  }
  