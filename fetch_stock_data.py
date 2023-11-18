import yfinance as yf
import sys

# Get the stock ticker from the command-line argument
ticker = sys.argv[1]
print(f"Fetching data for stock: {ticker}")

# Fetch stock data
data = yf.Ticker(ticker)
info = data.history(period="1d")

print(f"Data retrieved: {info}")  # Add this line for debugging

# Display the current or closing price
if not info.empty:
    last_row = info.tail(1)
    current_price = last_row['Close'].values[0]
    print(f"Stock: {ticker}")
    print(f"Current Price: {current_price}")
else:
    print(f"Stock data for {ticker} not found")
