# Conventional Commits Cheat Sheet

這份文件說明 Git Commit 訊息的慣例格式，請依照下列規範撰寫，以提升專案可讀性與維護性。

## 格式說明

### 範例：

- feat: add sitter registration form
- fix: resolve login redirect bug
- refactor(controller): extract DB logic
- style(view): adjust footer layout
- docs: update README with setup instructions
- chore: update .gitignore for uploads folder

---

## 類型說明（type 對照表）

| 類型（type） | 用途說明                                  | 範例 |
|--------------|-------------------------------------------|------|
| feat         | 新增功能（feature）                        | feat: add order search page |
| fix          | 修正錯誤（bug fix）                        | fix: correct breed filter logic |
| refactor     | 重構程式碼（不改變外部行為）               | refactor: simplify DB connect logic |
| style        | 樣式調整（排版、空格、命名，不含邏輯）     | style: unify navbar font size |
| docs         | 修改說明文件（README、註解等）             | docs: revise setup instructions |
| test         | 測試相關變更（新增或修正 test code）       | test: add unit test for booking logic |
| chore        | 雜項（建置、依賴更新、gitignore 等）       | chore: update .gitignore rules |

---

## 命名建議

- <scope> 建議用資料夾或模組名稱，如：views, controller, db, auth
- <簡短描述> 建議 1 行說完，動詞開頭（add、fix、update...）

---

## 小提醒

- 不要用中文作為 commit type
- 英文請使用小寫
- message 請用祈使句（即「做什麼」，而非「已做」）
