<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
                xmlns:html="http://www.w3.org/TR/REC-html40"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
  <xsl:template match="/">
    <html lang="id">
      <head>
        <title>XML Sitemap Engine — RooterIN Eco-Plumbing Hub</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;family=Outfit:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
        <style type="text/css">
          * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
          }
          body {
            background-color: #061417;
            color: #e2e8f0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            min-height: 100vh;
            padding-bottom: 60px;
          }
          a {
            color: #00e599;
            text-decoration: none;
            transition: all 0.2s ease;
          }
          a:hover {
            color: #10b981;
            text-decoration: underline;
          }
          .header-bar {
            background: linear-gradient(180deg, #0b1c20 0%, #061417 100%);
            border-bottom: 1px solid rgba(16, 185, 129, 0.2);
            padding: 24px 32px;
          }
          .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
          }
          .brand-group {
            display: flex;
            align-items: center;
            gap: 16px;
          }
          .brand-logo {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(0, 229, 153, 0.4);
            border-radius: 14px;
            color: #00e599;
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
            font-weight: 800;
            padding: 8px 16px;
            letter-spacing: -0.5px;
          }
          .brand-title {
            font-family: 'Outfit', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
          }
          .brand-subtitle {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 500;
          }
          .btn-home {
            background: #10b981;
            color: #061417;
            font-weight: 700;
            font-size: 13px;
            padding: 10px 20px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
          }
          .btn-home:hover {
            background: #00e599;
            color: #061417;
            text-decoration: none;
            transform: translateY(-1px);
          }
          .main-container {
            max-width: 1200px;
            margin: 32px auto 0;
            padding: 0 24px;
          }
          .info-card {
            background: rgba(19, 34, 38, 0.8);
            border: 1px solid rgba(16, 185, 129, 0.25);
            border-radius: 20px;
            padding: 20px 24px;
            margin-bottom: 24px;
            backdrop-filter: blur(8px);
            display: flex;
            align-items: flex-start;
            gap: 16px;
          }
          .info-icon {
            background: rgba(16, 185, 129, 0.2);
            border-radius: 12px;
            color: #00e599;
            font-size: 20px;
            padding: 8px;
            line-height: 1;
            flex-shrink: 0;
          }
          .info-text {
            color: #cbd5e1;
            font-size: 13px;
            line-height: 1.6;
          }
          .stats-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #0b1220;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 16px 24px;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
          }
          .stats-group {
            display: flex;
            align-items: center;
            gap: 12px;
          }
          .stats-count {
            font-family: 'Outfit', sans-serif;
            font-size: 24px;
            font-weight: 800;
            color: #00e599;
          }
          .stats-label {
            font-size: 13px;
            color: #94a3b8;
            font-weight: 600;
          }
          .protocol-badge {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #00e599;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
          }
          .table-wrapper {
            background: #132226;
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.5);
          }
          table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
          }
          th {
            background: #0b1c20;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px 20px;
            border-bottom: 1px solid rgba(16, 185, 129, 0.2);
          }
          td {
            padding: 14px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 13px;
            vertical-align: middle;
          }
          tr:hover td {
            background: rgba(16, 185, 129, 0.04);
          }
          tr:last-child td {
            border-bottom: none;
          }
          .url-cell {
            word-break: break-all;
            font-weight: 500;
          }
          .badge-priority {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(0, 229, 153, 0.3);
            color: #00e599;
            font-weight: 700;
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 8px;
            display: inline-block;
          }
          .badge-freq {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #cbd5e1;
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 8px;
            display: inline-block;
            text-transform: uppercase;
          }
          .lastmod-cell {
            color: #94a3b8;
            font-size: 12px;
            white-space: nowrap;
          }
          .footer-text {
            text-align: center;
            margin-top: 32px;
            color: #64748b;
            font-size: 12px;
          }
        </style>
      </head>
      <body>
        <div class="header-bar">
          <div class="header-container">
            <div class="brand-group">
              <div class="brand-logo">RooterIN</div>
              <div>
                <div class="brand-title">XML Sitemap Engine</div>
                <div class="brand-subtitle">Professional Eco-Plumbing Hub &amp; Local Geo-Targeting Index</div>
              </div>
            </div>
            <a href="/" class="btn-home">&#8592; Beranda RooterIN</a>
          </div>
        </div>

        <div class="main-container">
          <div class="info-card">
            <div class="info-icon">&#128161;</div>
            <div class="info-text">
              <strong>Petunjuk Peta Situs:</strong> Peta Situs XML ini dibuat secara otomatis oleh <strong>RooterIN SEO Engine</strong> untuk memfasilitasi perayapan mesin pencari (seperti Googlebot &amp; Bingbot) dalam mengindeks seluruh struktur layanan, artikel edukasi, cakupan wilayah kota/kecamatan, dan dokumen resmi secara cepat dan akurat.
            </div>
          </div>

          <div class="stats-bar">
            <div class="stats-group">
              <span class="stats-count"><xsl:value-of select="count(sitemap:urlset/sitemap:url)"/></span>
              <span class="stats-label">Total URL Terdaftar dalam Sitemap</span>
            </div>
            <span class="protocol-badge">Standard Sitemaps 0.9 (Googlebot Ready)</span>
          </div>

          <div class="table-wrapper">
            <table>
              <thead>
                <tr>
                  <th style="width: 55%;">LOKASI URL</th>
                  <th style="width: 12%; text-align: center;">PRIORITAS</th>
                  <th style="width: 13%; text-align: center;">FREKUENSI</th>
                  <th style="width: 20%; text-align: right;">PEMBARUAN TERAKHIR</th>
                </tr>
              </thead>
              <tbody>
                <xsl:for-each select="sitemap:urlset/sitemap:url">
                  <tr>
                    <td class="url-cell">
                      <a href="{sitemap:loc}" target="_blank">
                        <xsl:value-of select="sitemap:loc"/>
                      </a>
                    </td>
                    <td style="text-align: center;">
                      <span class="badge-priority">
                        <xsl:value-of select="sitemap:priority"/>
                      </span>
                    </td>
                    <td style="text-align: center;">
                      <span class="badge-freq">
                        <xsl:value-of select="sitemap:changefreq"/>
                      </span>
                    </td>
                    <td class="lastmod-cell" style="text-align: right;">
                      <xsl:value-of select="sitemap:lastmod"/>
                    </td>
                  </tr>
                </xsl:for-each>
              </tbody>
            </table>
          </div>

          <div class="footer-text">
            Generated for Googlebot / Search Engine consumption by RooterIN SEO Engine &#8226; Naungan J&amp;J Group Holding
          </div>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
