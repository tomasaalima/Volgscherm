// Armazena as configurações de cores para cada tema
const themeColors = {
    '01': {
      '--palette-A': '#1D1E26',
      '--palette-B': '#202126',
      '--palette-C': '#737272',
      '--palette-D': '#889ABF',
      '--palette-E': '#FFFFFF09',
    },
    '02': {
      '--palette-A': '#ffffff',
      '--palette-B': '#EBE8E7',
      '--palette-C': '#9DFFEC',
      '--palette-D': '#2D73EB',
      '--palette-E': '#1D1E2609',
    },
    '03': {
      '--palette-A': '#224D59',
      '--palette-B': '#3A8499',
      '--palette-C': '#58C6E5',
      '--palette-D': '#49A5BF',
      '--palette-E': '#FFFFFF09',
    },
  };
  
  // Aplica a classe de tema atual ao elemento
  function applyThemeClass(id) {
    let theme = document.getElementById(id);
    theme.classList.add("actual-theme");
  }
  
  // Define as cores do tema selecionado
  function setThemeColors(id) {
    const colors = themeColors[id];
  
    Object.entries(colors).forEach(([property, value]) => {
      document.documentElement.style.setProperty(property, value);
    });
  }
  
  // Função principal para definir um tema
  function setTheme(id) {
    applyThemeClass(id);
    setThemeColors(id);
  }
  