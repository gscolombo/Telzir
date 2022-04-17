<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Telzir - FaleMais</title>
  </head>
  <body>
    <div class="container">
      <section class="landing">
        <div class="text-content">
          <h1><b>FaleMais</b> com a Telzir!</h1>
          <h3>
            Adquira um plano e ganhe minutos grátis para falar com quem quiser!
          </h3>
        </div>
        <form method="post">
          <p>Faça uma simulação!</p>
          <div class="labels">
            <label for="origin">DDD de origem:
              <select required name="origin" id="origin" placeholder="Selecione um DDD">
                <option value="" disabled selected>Selecione um DDD</option>
                <?php
                    $codes = $database -> get_codes(); 
                    foreach ($codes as $ddd) :
                  ?>
                    <option required value="<?php echo "{$ddd["code"]}" ?>"><?php echo "0{$ddd["code"]}" ?></option>
                  <?php endforeach; ?>
              </select>
            </label>
            <label for="destiny">DDD de destino:
              <select required name="destiny" id="destiny">
                <option value="" disabled selected>Selecione um DDD</option>
                  <?php
                    $codes = $database -> get_codes(); 
                    foreach ($codes as $ddd):
                  ?>
                    <option value="<?php echo "{$ddd["code"]}" ?>"><?php echo "0{$ddd["code"]}" ?></option>
                  <?php endforeach; ?>
              </select>
            </label>
            <label for="time"
              >Tempo de ligação:
              <input required name="time" id="time" type="text" placeholder="Minutos de ligação"/>
            </label>
          </div>
          <button>Simular valores</button>
          <span><?php echo isset($alert) ? $alert : "" ?></span>
        </form>
      </section>
      <section class="tables">
        <table class="ref">
          <thead>
            <tr>
              <th>Origem</th>
              <th>Destino</th>
              <th>Tempo</th>
              <th>Sem FaleMais</th>
          </thead>
          <tbody>
            <?php 
              if (isset($simulation) && is_object($simulation)) :
            ?>
              <tr>
                <td><?php echo $simulation -> getter("ddd_origin"); ?></td>
                <td><?php echo $simulation -> getter("ddd_destiny"); ?></td>
                <td><?php echo $simulation -> getter("time"); ?></td>
                <td><?php echo "R$" . number_format($simulation -> getter("base_price"), 2, ","); ?></td>
              </tr>
            <?php else : ?>
              <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
        <table class="promo">
          <thead>
            <tr>
              <th>FaleMais30</th>
              <th>FaleMais60</th>
              <th>FaleMais120</th>
          </thead>
          <tbody>
          <?php 
            if (isset($simulation) && is_object($simulation)) :
              $promo30 = $simulation -> get_promo_price("30");
              $promo60 = $simulation -> get_promo_price("60");
              $promo120 = $simulation -> get_promo_price("120");
          ?>
                <tr>
                  <td><?php echo $promo30["price"] ;?></td>
                  <td><?php echo $promo60["price"] ;?></td>
                  <td><?php echo $promo120["price"] ;?></td>
                </tr>
              </tbody>
            </table>
            <div class="discounts">
              <span><?php echo $promo30["discount"]; ?></span>
              <span><?php echo $promo60["discount"]; ?></span>
              <span><?php echo $promo120["discount"]; ?></span>
            </div>
            <?php else: ?>
              <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
              </tr>
            </tbody>
        </table>
        <?php endif; ?>
      </section>
    </div>
  </body>
</html>