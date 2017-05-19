$(document).ready(function() {

  var entry = '';
  var ans = '';
  var current = '';
  var prevNum = '';
  var log = '';
  var decimal = false;
  var opperation = '';


  function clear() {
    entry = '';
    current = '';
    $('#total').text('0');
    decimal = false;
  }

  function clearAll() {
    current = '';
    entry = '';
    ans = '';
    log = '';
    decimal = false;
    prevNum = '';
    $('#total').text('0');
    $('#currProblem').text('0');
  }

  // Closure
  (function() {
    /**
     * Decimal adjustment of a number.
     *
     * @param {String}  type  The type of adjustment.
     * @param {Number}  value The number.
     * @param {Integer} exp   The exponent (the 10 logarithm of the adjustment base).
     * @returns {Number} The adjusted value.
     */
    function decimalAdjust(type, value, exp) {
      // If the exp is undefined or zero...
      if (typeof exp === 'undefined' || +exp === 0) {
        return Math[type](value);
      }
      value = +value;
      exp = +exp;
      // If the value is not a number or the exp is not an integer...
      if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
        return NaN;
      }
      // If the value is negative...
      if (value < 0) {
        return -decimalAdjust(type, -value, exp);
      }
      // Shift
      value = value.toString().split('e');
      value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
      // Shift back
      value = value.toString().split('e');
      return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
    }

    // Decimal round
    if (!Math.round10) {
      Math.round10 = function(value, exp) {
        return decimalAdjust('round', value, exp);
      };
    }
    // Decimal floor
    if (!Math.floor10) {
      Math.floor10 = function(value, exp) {
        return decimalAdjust('floor', value, exp);
      };
    }
    // Decimal ceil
    if (!Math.ceil10) {
      Math.ceil10 = function(value, exp) {
        return decimalAdjust('ceil', value, exp);
      };
    }
  })();

  $('.numbers').click(function() {

    if (current.length >= 8) {
      clearAll();
      $('#total').text("Error");
      $('#currProblem').text("Too many digits!");

    } else {


      entry = $(this).text();
      if (entry === 'C') {
        clear();
      } else if (entry === 'AC') {
        clearAll();
      } else if (entry === "=") {

        ans = Math.round10(eval(prevNum + opperation + current), -2);

        $('#total').text(ans);
        $('#currProblem').text(prevNum + " " + opperation + " " + current + " = " + ans);
        current = ans;
      } else if (entry === ".") {
        if (!decimal) {

          current += entry;
          $('#total').text(current);
        }
        decimal = true;
      } else {

        current += entry;
        $('#total').text(current);
      }
    }
    console.log(entry);
  });

  $('.operators').click(function() {
    if (current !== '') {
      opperation = $(this).text();
      prevNum = current;
      current = '';
      decimal = false;
      $('#currProblem').text(prevNum + " " + opperation);
      console.log(opperation);
    } else {
      opperation = $(this).text();
      $('#currProblem').text(prevNum + " " + opperation);
    }
  });
});
