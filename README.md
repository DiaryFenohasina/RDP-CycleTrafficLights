# 🔄 RDP — Laravel + Docker + Redis

Ce projet `RDP` est une application Laravel configurée pour tourner dans des conteneurs Docker avec Redis comme moteur de cache, et une base de données SQLite (ou MySQL, selon configuration).

---

## 🧰 Prérequis

Avant de démarrer, assure-toi d’avoir installé :

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Git](https://git-scm.com/)

---

## 🚀 Lancement rapide

### 1. Cloner le projet

```bash
git clone git@github.com:DiaryFenohasina/RDP-CycleTrafficLights.git
cd RDP
docker-compose up -d --build

