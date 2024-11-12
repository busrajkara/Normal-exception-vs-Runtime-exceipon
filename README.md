
## `Exception` vs `RuntimeException`
PHP’de `Exception` ve `RuntimeException` sınıfları, özel durumların (exception) yönetilmesi için kullanılan iki temel istisna türüdür. Her ikisi de PHP’nin istisna hiyerarşisinde yer alır ve `Exception` sınıfını temel alır, ancak amaçları ve kullanım alanları farklıdır. 

İşte bu iki sınıf arasındaki temel farkları ve kullanım detaylarını daha açıklayıcı bir şekilde ele alalım.

---

### 🎯 1. `Exception` (Genel İstisna)
   - **Genel Tanım**: `Exception`, PHP’deki tüm özel durumlar için temel sınıftır. Tüm istisna sınıfları `Exception` sınıfından türetilir.
   - **Ne Zaman Kullanılır?**: Genellikle, geniş kapsamlı hatalar veya beklenmedik durumlar için kullanılır. Uygulamanın her aşamasında oluşabilecek hatalar `Exception` sınıfıyla temsil edilebilir.
   - **Örnek Durumlar**: 
      - Dosya okuma işlemi sırasında dosyanın bulunamaması
      - Dış bir API’den yanıt alınamaması
      - Kullanıcı girişinde yanlış veri formatı gibi durumlar
   - **Esneklik**: `Exception` sınıfı, daha spesifik alt sınıflar oluşturmaya da olanak tanır, bu nedenle geliştiriciler, uygulamaya özel istisnalar oluşturabilirler (örneğin, `DatabaseException` ya da `FileNotFoundException` gibi).

---

### 🚀 2. `RuntimeException` (Çalışma Zamanı İstisnası)
   - **Genel Tanım**: `RuntimeException`, `Exception` sınıfının bir alt sınıfıdır ve sadece çalışma zamanı (runtime) sırasında oluşan hataları ifade eder.
   - **Ne Zaman Kullanılır?**: Program çalıştırıldıktan sonra ortaya çıkabilecek mantıksal veya beklenmedik hatalar için kullanılır. `RuntimeException`, genellikle programcı tarafından önceden tahmin edilemeyen hatalarla ilgilidir.
   - **Örnek Durumlar**:
      - Bölme işlemi yapılırken sıfıra bölme hatası
      - Diziye erişim sırasında geçersiz bir anahtar kullanılması
      - Çalışma esnasında beklenmeyen bir değerin parametre olarak verilmesi
   - **Spesifiklik**: `RuntimeException` daha dar kapsamlı bir sınıf olduğundan, belirli bir çalışma zamanı koşulunda oluşan hataları ele alırken kullanışlıdır.

---

### ⚖️ `Exception` ve `RuntimeException` Arasındaki Temel Farklar

| Özellik                         | Exception                     | RuntimeException                     |
|---------------------------------|-------------------------------|--------------------------------------|
| **Kapsam**                      | Geniş kapsamlıdır.           | Çalışma zamanı hatalarına özgüdür.   |
| **Ne Zaman Kullanılır?**        | Her türlü hatayı kapsar.      | Sadece çalışma zamanı hataları için. |
| **Esneklik**                    | Özel sınıflar türetilebilir.  | Daha spesifik durumlara yöneliktir.  |
| **Yakalama Sıralaması**         | Daha genel olduğu için sona bırakılabilir. | Daha spesifik olduğundan önce yakalanır. |

---

### 🎉 Örnek Kullanım

PHP’de aşağıdaki gibi `Exception` ve `RuntimeException` kullanımıyla hataların nasıl ele alınabileceğini görebiliriz:

```php
try {
    // Çalışma zamanı sırasında hata oluşturabilecek bir kod parçası
    throw new RuntimeException("Çalışma zamanı hatası oluştu!");
} catch (RuntimeException $e) {
    // RuntimeException daha spesifik olduğu için önce yakalanır
    echo "<span style='color: red;'>RuntimeException yakalandı: </span>" . $e->getMessage();
} catch (Exception $e) {
    // Genel Exception daha geniş kapsamlı olduğu için sonra yakalanır
    echo "<span style='color: blue;'>Genel Exception yakalandı: </span>" . $e->getMessage();
}
```

Bu örnekte, `RuntimeException` daha spesifik olduğu için ilk olarak yakalanır. Eğer `RuntimeException` bloğu olmasaydı, hata doğrudan `Exception` bloğunda yakalanırdı. Bu sayede, farklı türdeki hataları daha detaylı yönetebiliriz.

--- 

### 🔔 Özetle:
- **`Exception`**: Geniş kapsamlıdır ve hem çalışma zamanı hem de derleme aşamasında oluşabilecek tüm hataları kapsar.
- **`RuntimeException`**: Çalışma zamanı sırasında oluşan, daha dar kapsamlı hataları ifade eder.

Bu iki sınıfın doğru bir şekilde kullanılması, uygulamanızın daha güvenilir ve hataları daha iyi yöneten bir yapıya sahip olmasını sağlar. 🎯
