@echo off
echo ==========================================
echo   ENVOI VERS GITHUB & RAILWAY
echo ==========================================
echo.

:: 1. Ajouter tous les fichiers
git add .

:: 2. Demander un petit message (optionnel)
set /p msg="Message de ce changement (Tapez Entree pour 'Mise a jour'): "
if "%msg%"=="" set msg="Mise a jour"

:: 3. Valider
git commit -m "%msg%"

:: 4. Envoyer
echo.
echo Envoi en cours...
git push

echo.
echo ==========================================
echo   TERMINE !
echo ==========================================
pause
