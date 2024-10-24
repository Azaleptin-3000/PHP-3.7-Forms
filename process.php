<?php
// Отладка: выводим содержимое массива $_POST
echo "Скрипт запущен. <br>";
print_r($_POST); // Выводим данные для проверки

// Проверяем, был ли отправлен запрос методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Инициализируем массив для хранения сообщений
    $messages = [];

    // Обработка первой формы (отзыв)
    if (isset($_POST['name']) && isset($_POST['review']) && isset($_POST['rating'])) {
        $name = htmlspecialchars($_POST['name']);
        $review = htmlspecialchars($_POST['review']);
        $rating = intval($_POST['rating']);
        
        $messages[] = "Отзыв от $name: \"$review\" (Рейтинг: $rating)";
    }

    // Обработка второй формы (отмена заказа)
    if (isset($_POST['order_id']) && isset($_POST['reason'])) {
        $order_id = htmlspecialchars($_POST['order_id']);
        $reason = htmlspecialchars($_POST['reason']);
        
        $messages[] = "Заказ #$order_id отменен. Причина: \"$reason\"";
    }

    // Обработка третьей формы (добавление отзыва)
    if (isset($_POST['new_name']) && isset($_POST['new_review']) && isset($_POST['new_rating'])) {
        $new_name = htmlspecialchars($_POST['new_name']);
        $new_review = htmlspecialchars($_POST['new_review']);
        $new_rating = intval($_POST['new_rating']);
        
        $messages[] = "Новый отзыв от $new_name: \"$new_review\" (Рейтинг: $new_rating)";
    }

    // Выводим сообщения
    if (!empty($messages)) {
        echo "<h2>Результаты обработки форм:</h2>";
        echo "<ul>";
        foreach ($messages as $message) {
            echo "<li>$message</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>Нет данных для отображения.</h2>";
    }
} else {
    echo "<h2>Ошибка: форма не была отправлена.</h2>";
}
?>