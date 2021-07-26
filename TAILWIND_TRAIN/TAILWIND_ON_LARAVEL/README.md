# TAILWiND DANS LARAVEL

[Installation](https://tailwindcss.com/docs/guides/laravel) 

NB: 

- Pour compiler les modification: 
    - **npm run dev**
    - **npm run watch**
    - **npm run watch-poll**
   
### Personaliation de la palette de couleur
- [Documentation](https://tailwindcss.com/docs/customizing-colors)
    1. Extension des valeurs par defaut: 
        - Permet d'etendre la pallette de couleur par defaut, plutot que de remplacer. 
        - Dans le fichier `tailwinf.config.js`:
            -   ```
                    module.exports = {
                        theme: {
                            extend: {
                                colors: {
                                    // la configuration souhaité,
                                        }
                                    }
                                }
                            }
                ```
    2. Organisation des couleur à partir de la palette tailwind. 
        - Importation de **tailwind/colors** dans le fichier `tailwind.config.js`
            - `const colors = require('tailwindcss/colors')`
        - Configuration du theme:
            -   ```
                    module.exports = {
                        theme: {
                            colors: {
                            transparent: 'transparent',
                            current: 'currentColor',
                            black: colors.black,
                            white: colors.white,
                            gray: colors.trueGray,
                            indigo: colors.indigo,
                            red: colors.rose,
                            yellow: colors.amber,
                            }
                        }
                    }
                ```
        - [Reference complete de palette de couleurs](https://tailwindcss.com/docs/customizing-colors) 
    3. Couleur personnalisé:
        -   ```
                module.exports = {
                    theme: {
                        colors: {
                        transparent: 'transparent',
                        current: 'currentColor',
                        blue: {
                            light: '#85d7ff',
                            DEFAULT: '#1fb6ff',
                            dark: '#009eeb',
                        },
                        pink: {
                            light: '#ff7ce5',
                            DEFAULT: '#ff49db',
                            dark: '#ff16d1',
                        },
                        gray: {
                            darkest: '#1f2d3d',
                            dark: '#3c4858',
                            DEFAULT: '#c0ccda',
                            light: '#e0e6ed',
                            lightest: '#f9fafc',
                        }
                        }
                    }
                }
            ```
